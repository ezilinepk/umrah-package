<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use App\Models\User;
use App\Models\PaperFile;
use App\Models\Log;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $list = Paper::orderBy('status','ASC')->get();
        } else {
            $list = Paper::where('uploaded_by', auth()->user()->id)->orderBy('status','ASC')->get();
        }

        return view('paper.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();

        $trg_officer = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')->where('roles.name', '=', 'Trg Officer')->select('users.id as id','users.name as name')->get();

        return view('paper.create', compact('category','trg_officer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'category_id' => 'required',
            'module_name' => 'required',
            'course_name' => 'required',
            'mos' => 'required',
            'name' => 'required',
            'date' => 'required',
            'file' => 'required|max:10000',
            'publish' => 'required'
        ]);

        if (auth()->user()->hasRole('Trg Officer')) {
            $type = 'trg';
        } else {
            $type = 'uploader';
        }

        DB::beginTransaction();
        try{

            $paper = Paper::create([

                'category_id' => $request->category_id,
                'module_name' => $request->module_name,
                'course_name' => $request->course_name,
                'mos' => $request->mos,
                'name' => $request->name,
                'status' => 'pending',
                'date' => $request->date,
                'uploaded_by' => auth()->user()->id,
                'approved_by_trg' => $request->trg_officer,
                'trg_status' => 'pending',
                'publish' => $request->publish  
            ]);


            for($i = 0; $i < count($request->file); $i++) {
                if (isset($request->file[$i])) {
                    //Get FileName with extension
                    $fileNameWithExt = $request->file[$i]->getClientOriginalName();

                    //get Only FileName
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    //Get only Extension
                    $extension = $request->file[$i]->getClientOriginalExtension();
                    //FileName To Store
                    $file = $fileName . '_' . time() . '.' . $extension;
                    //upload Image
                    $path = $request->file[$i]->move(public_path('files'), $file);
            

                    PaperFile::create([

                        'paper_id' => $paper->id,
                        'file' => $file,
                        'description' => $request->description[$i],
                        'type' => $type
                    ]);
                }


            }

            Log::create([

                'paper_id' => $paper->id,
                'changed_by' => auth()->user()->id,
                'type' => 'created',
                'status' => 'pending',
                'comment' => 'Paper Created'
             ]);

            DB::commit();

            return redirect()->back()->with('success',__('Your Data Saved Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Paper::where('uid', $id)->first();

        return view('paper.view',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Paper::where('uid', $id)->first();

        $category = Category::get();

        $trg_officer = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')->where('roles.name', '=', 'Trg Officer')->select('users.id as id','users.name as name')->get();

        return view('paper.edit', compact('detail', 'category','trg_officer'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'category_id' => 'required',
            'module_name' => 'required',
            'course_name' => 'required',
            'mos' => 'required',
            'name' => 'required',
            'date' => 'required',
            'publish' => 'required'
        ]);

        $paper = Paper::where('uid', $id)->first();

        DB::beginTransaction();
        try{

            Paper::where('id', $paper->id)->update([

                'category_id' => $request->category_id,
                'module_name' => $request->module_name,
                'course_name' => $request->course_name,
                'mos' => $request->mos,
                'name' => $request->name,
                'date' => $request->date,
                'uploaded_by' => auth()->user()->id,
                'approved_by_trg' => $request->trg_officer,
                'publish' => $request->publish
            ]);

            PaperFile::where('paper_id', $paper->id)->delete();

            if (isset($request->saveFile)) {

                for ($i=0; $i < count($request->saveFile); $i++) { 

                    if (isset($request->uploadType[$i])) {
                        $type = $request->uploadType[$i];
                    } else {
                        if (auth()->user()->hasRole('Trg Officer')) {
                            $type = 'trg';
                        } else {
                            $type = 'uploader';
                        }
                    }

                    PaperFile::create([

                        'paper_id' => $paper->id,
                        'file' => $request->saveFile[$i],
                        'description' => $request->description[$i],
                        'type' => $type
                    ]);
                }
            }

            if (isset($request->file)) {
                for($i = 0; $i < count($request->file); $i++) {
                    if (isset($request->file[$i])) {
                        //Get FileName with extension
                        $fileNameWithExt = $request->file[$i]->getClientOriginalName();

                        //get Only FileName
                        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        //Get only Extension
                        $extension = $request->file[$i]->getClientOriginalExtension();
                        //FileName To Store
                        $file = $fileName . '_' . time() . '.' . $extension;
                        //upload Image
                        $path = $request->file[$i]->move(public_path('files'), $file);
                
                        if (auth()->user()->hasRole('Trg Officer')) {
                            $type = 'trg';
                        } else {
                            $type = 'uploader';
                        }

                        PaperFile::create([

                            'paper_id' => $paper->id,
                            'file' => $file,
                            'description' => $request->description[$i],     
                            'type' => $type
                        ]);
                    }
                }
    
            }

            Log::create([

                'paper_id' => $paper->id,
                'changed_by' => auth()->user()->id,
                'type' => 'updated',
                'status' => 'pending',
                'comment' => 'Paper Updated'
             ]);
            
            DB::commit();

            return redirect()->back()->with('success',__('Your Data Saved Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }    }

    /**
     *  TRG Approval List
     **/

    public function trg_list()
    {
        if (auth()->user()->hasRole('Admin')) {
            $list = Paper::where('publish','yes')->orderBy('status','ASC')->get();
        } else {
            $list = Paper::where('approved_by_trg', auth()->user()->id)->where('publish','yes')->orderBy('status','ASC')->get();
        }

        $senior_officer = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')->where('roles.name', '=', 'Senior Instructor')->select('users.id as id','users.name as name')->get();

        return view('paper.trg_list',compact('list','senior_officer'));
    }

    /**
     * Senior Instructor Paper List
     **/

     public function senior_list()
     {
         if (auth()->user()->hasRole('Admin')) {
            $list = Paper::orderBy('status','ASC')->where('trg_status', 'approaved')->get();
         } else {
            $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('trg_status', 'approaved')->orderBy('status','ASC')->get();
         }

         $chief_officer = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')->where('roles.name', '=', 'Chief Instructor')->select('users.id as id','users.name as name')->get();

         return view('paper.senior_list', compact('list','chief_officer'));
     } 

     /**
      * Chief Instructor Paper List
      **/

      public function chief_list()
      {
          if (auth()->user()->hasRole('Admin')) {
            $list = Paper::orderBy('status','ASC')->where('senior_instructor_status', 'approaved')->get();
          } else {
            $list = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('senior_instructor_status', 'approaved')->orderBy('status','ASC')->get();
          }

          return view('paper.chief_list',compact('list'));
      } 

      /**
       * Exam Approved Paper List
       **/

       public function exam_list()
       {
           $list = Paper::where('send_to_exam', 'yes')->get();

           return view('paper.exam_list',compact('list'));
       } 

       /**
        * TRG Approval Store
        **/

        public function trg_approved(Request $request)
        {
            $this->validate($request, [

                'trg_paper_id' => 'required',
                'status' => 'required',
                'comments' => 'required'
            ]);

            DB::beginTransaction();
            try{

                $paper = Paper::where('id', $request->trg_paper_id)->first();

                Paper::where('id', $paper->id)->update([

                    'trg_comment' => $request->comments, 
                    'trg_status' => $request->status, 
                    'approved_by_senior_intructor' => $request->senior_instructor 
                ]);

                Log::create([

                    'paper_id' => $paper->id,
                    'changed_by' => auth()->user()->id,
                    'type' => 'Trg Verfication',
                    'status' => $request->status,
                    'comment' => $request->comments
                ]);

                if ($request->status == 'reject') {
                    Paper::where('id', $paper->id)->update(['status' => $request->status, 'rejection' => 'ds']);
                }

                DB::commit();

                return redirect()->back()->with('success',__('Your Data Updated Successfully'));

            } catch (\Exception $e) {

                DB::rollback();

                return redirect()->back()->with('danger',__('Something went Wrong'));

            }

        } 

        /**
         * Senior Instructor Approved Pape
         **/

         public function senior_approved(Request $request)
         {
             $this->validate($request, [

                'senior_paper_id' => 'required',
                'status' => 'required',
                'comments' => 'required'
            ]);

            DB::beginTransaction();
            try{


                $paper = Paper::where('id', $request->senior_paper_id)->first();

                Paper::where('id', $paper->id)->update([

                    'senior_instructor_comment' => $request->comments,
                    'senior_instructor_status' => $request->status,
                    'approved_by_chief_instructor' => $request->chief_instructor
                ]);

                Log::create([

                    'paper_id' => $paper->id,
                    'changed_by' => auth()->user()->id,
                    'type' => 'Senior Verfication',
                    'status' => $request->status,
                    'comment' => $request->comments
                ]);


                if ($request->status == 'reject') {
                    Paper::where('id', $paper->id)->update(['status' => $request->status, 'rejection' => $request->rejection]);
                }

                DB::commit();

                return redirect()->back()->with('success',__('Your Data Updated Successfully'));

            } catch (\Exception $e) {

                DB::rollback();

                return redirect()->back()->with('danger',__('Something went Wrong'));

            }
         } 

         /**
          * Chief Instructor Approval Page
          **/

          public function chief_approved(Request $request)
          {
            $this->validate($request, [

                'chief_paper_id' => 'required',
                'final_status' => 'required'
            ]);

            DB::beginTransaction();
            try{

                if ($request->final_status == 'Approved') {
                    $status = 'approaved';
                } else {
                    $status = 'reject';
                }

                $paper = Paper::where('id', $request->chief_paper_id)->first();

                Paper::where('id', $paper->id)->update(['chief_instructor_status' => $status, 'chief_instructor_comment' => $request->comments]);

                Log::create([

                    'paper_id' => $paper->id,
                    'changed_by' => auth()->user()->id,
                    'type' => 'CI Verfication',
                    'status' => $status,
                    'comment' => $request->comments
                ]);


                if ($status == 'reject') {
                    Paper::where('id', $paper->id)->update(['status' => $status, 'rejection' => $request->rejection]);
                }

                if ($status == 'approaved') {
                    Paper::where('id', $paper->id)->update(['status' => $status]);
                }

                DB::commit();

                return redirect()->back()->with('success',__('Your Data Updated Successfully'));

            } catch (\Exception $e) {

                DB::rollback();

                return redirect()->back()->with('danger',__('Something went Wrong'));

            }
          } 

        /**
         * Again Submission
         **/
        public function againSubmission(Request $request)
        {
            $this->validate($request, [

                'submission_id' => 'required'
            ]);

            DB::beginTransaction();
            try{

                $paper = Paper::where('id', $request->submission_id)->first();

                if ($paper->rejection == 'ds') {

                    Paper::where('id', $paper->id)->update([

                        'status' => 'pending',
                        'trg_status' => 'pending',
                        'senior_instructor_status' => 'pending',
                        'chief_instructor_status' => 'pending'
                    ]);
                } else if ($paper->rejection == 'trg') {

                    Paper::where('id', $paper->id)->update([

                        'status' => 'pending',
                        'trg_status' => 'approaved',
                        'senior_instructor_status' => 'pending',
                        'chief_instructor_status' => 'pending'
                    ]);
                } else if ($paper->rejection == 'senior') {

                    Paper::where('id', $paper->id)->update([

                        'status' => 'pending',
                        'senior_instructor_status' => 'approaved',
                        'chief_instructor_status' => 'pending'
                    ]);
                }

                Log::create([

                    'paper_id' => $paper->id,
                    'changed_by' => auth()->user()->id,
                    'type' => 'Again Submission',
                    'status' => 'pending',
                    'comment' => 'Paper Again Submit for Approval'
                ]);


                DB::commit();

                return redirect()->back()->with('success',__('Submitted Successfully'));

            } catch (\Exception $e) {

                DB::rollback();

                return redirect()->back()->with('danger',__('Something went Wrong'));

            }
        }

        /**
         * Send to Exam Department 
         **/

        public function sendToExam(Request $request)
        {
            $this->validate($request, [

                'trg_exam_paper_id' => 'required'
            ]);

            DB::beginTransaction();
            try{

                $paper = Paper::where('id', $request->trg_exam_paper_id)->first();

                Paper::where('id', $paper->id)->update(['send_to_exam' => 'yes']);

                Log::create([

                    'paper_id' => $paper->id,
                    'changed_by' => auth()->user()->id,
                    'type' => 'Send to Exam',
                    'status' => 'send',
                    'comment' => 'Paper Send to Exam Department'
                ]);

            
                DB::commit();

                return redirect()->back()->with('success',__('Send to Exam Department Successfully'));

            } catch (\Exception $e) {

                DB::rollback();

                return redirect()->back()->with('danger',__('Something went Wrong'));

            }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [

            'del_paper_id' => 'required'
        ]);

        DB::beginTransaction();
        try{

            $paper = Paper::where('id', $request->del_paper_id)->first();

            if ($paper->status == 'approaved') {
                return redirect()->back()->with('danger',__('Sorry Paper is Approved'));
            } 

            Paper::where('id', $paper->id)->delete();

            DB::commit();

            return redirect()->back()->with('success',__('Submitted Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }

    /**
     * File View Function
     **/

    public function fileView($id)
    {
        $detail = PaperFile::where('id', $id)->first();

        return view('paper.fileView',compact('detail'));
    } 

    /**
    * View Paper Log
    **/

    public function viewLog($id)
    {
        $paper = Paper::where('uid', $id)->first();

        $log = Log::where('paper_id', $paper->id)->get();

        return view('paper.log', compact('log'));
    } 
}
