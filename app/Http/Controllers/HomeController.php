<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Paper;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        // Fetch data if needed
        $hotels =Hotel::all();

        // Pass data to the view

        if (auth()->user()->hasRole('Admin')) {
            $total = Paper::count();

            $pending = Paper::where('status', 'pending')->count();

            $reject = Paper::where('status', 'reject')->count();

            $approved = Paper::where('status', 'approaved')->count();
        } elseif (auth()->user()->hasRole('Chief Instructor')) {

            $total = Paper::where('approved_by_chief_instructor', auth()->user()->id)->count();

            $pending = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('status', 'pending')->count();

            $reject = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('status', 'reject')->count();

            $approved = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('status', 'approaved')->count();
        } elseif (auth()->user()->hasRole('Senior Instructor')) {
            $total = Paper::where('approved_by_senior_intructor', auth()->user()->id)->count();

            $pending = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('status', 'pending')->count();

            $reject = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('status', 'reject')->count();

            $approved = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('status', 'approaved')->count();

        } elseif (auth()->user()->hasRole('Trg Officer')) {
            $total = Paper::where('approved_by_trg', auth()->user()->id)->count();

            $pending = Paper::where('approved_by_trg', auth()->user()->id)->where('status', 'pending')->count();

            $reject = Paper::where('approved_by_trg', auth()->user()->id)->where('status', 'reject')->count();

            $approved = Paper::where('approved_by_trg', auth()->user()->id)->where('status', 'approaved')->count();
        } elseif (auth()->user()->hasRole('Ds Officer')) {
            $total = Paper::where('uploaded_by', auth()->user()->id)->count();

            $pending = Paper::where('uploaded_by', auth()->user()->id)->where('status', 'pending')->count();

            $reject = Paper::where('uploaded_by', auth()->user()->id)->where('status', 'reject')->count();

            $approved = Paper::where('uploaded_by', auth()->user()->id)->where('status', 'approaved')->count();
        } else {
            $total = Paper::count();

            $pending = Paper::where('status', 'pending')->count();

            $reject = Paper::where('status', 'reject')->count();

            $approved = Paper::where('status', 'approaved')->count();
        }

        return view('home', compact('total','pending','reject','approved' , 'hotels'));
    }

    /**
    * Dashboard Card Lists
    **/

    public function paperList($type)
    {
        if (auth()->user()->hasRole('Admin')) {

            if ($type == 'all') {
                $list = Paper::get();
            } elseif ($type == 'pending') {
                $list = Paper::where('status', '=', 'pending')->get();
            } elseif ($type == 'rejected') {
                $list = Paper::where('status', '=', 'reject')->get();
            } elseif ($type == 'approved') {
                $list = Paper::where('status', '=', 'approaved')->get();
            }
        } elseif (auth()->user()->hasRole('Chief Instructor')) {

            if ($type == 'all') {
                $list = Paper::where('approved_by_chief_instructor', auth()->user()->id)->get();
            } elseif ($type == 'pending') {
                $list = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('chief_instructor_status', '=', 'pending')->get();
            } elseif ($type == 'rejected') {
                $list = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('chief_instructor_status', '=', 'reject')->get();
            } elseif ($type == 'approved') {
                $list = Paper::where('approved_by_chief_instructor', auth()->user()->id)->where('chief_instructor_status', '=', 'approaved')->get();
            }
        } elseif (auth()->user()->hasRole('Senior Instructor')) {
            if ($type == 'all') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->get();
            } elseif ($type == 'pending') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('senior_instructor_status', '=', 'pending')->get();
            } elseif ($type == 'rejected') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('senior_instructor_status', '=', 'reject')->get();
            } elseif ($type == 'approved') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('senior_instructor_status', '=', 'approaved')->get();
            }
        } elseif (auth()->user()->hasRole('Trg Officer')) {
           if ($type == 'all') {
                $list = Paper::where('approved_by_trg', auth()->user()->id)->get();
            } elseif ($type == 'pending') {
                $list = Paper::where('approved_by_trg', auth()->user()->id)->where('trg_status', '=', 'pending')->get();
            } elseif ($type == 'rejected') {
                $list = Paper::where('approved_by_trg', auth()->user()->id)->where('trg_status', '=', 'reject')->get();
            } elseif ($type == 'approved') {
                $list = Paper::where('approved_by_trg', auth()->user()->id)->where('trg_status', '=', 'approaved')->get();
            }
        } elseif (auth()->user()->hasRole('Ds Officer')) {
            if ($type == 'all') {
                $list = Paper::where('uploaded_by', auth()->user()->id)->get();
            } elseif ($type == 'pending') {
                $list = Paper::where('uploaded_by', auth()->user()->id)->where('status', '=', 'pending')->get();
            } elseif ($type == 'rejected') {
                $list = Paper::where('uploaded_by', auth()->user()->id)->where('status', '=', 'reject')->get();
            } elseif ($type == 'approved') {
                $list = Paper::where('uploaded_by', auth()->user()->id)->where('status', '=', 'approaved')->get();
            }
        } else {
            if ($type == 'all') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->get();
            } elseif ($type == 'pending') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('senior_instructor_status', '=', 'pending')->get();
            } elseif ($type == 'rejected') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('senior_instructor_status', '=', 'reject')->get();
            } elseif ($type == 'approved') {
                $list = Paper::where('approved_by_senior_intructor', auth()->user()->id)->where('senior_instructor_status', '=', 'approaved')->get();
            }
        }

        return view('list',compact('list'));
    }

    /**
     * Update Profile
     **/

    public function profile()
    {
        return view('auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        if (isset($request->password)) {

            if ($request->password == $request->password_confirmation) {
                $password = bcrypt($request->password);
            } else {
                return redirect()->back()->with('danger',__('Password and Confirm Password does not matched'));
            }
        } else {
            $password = $user->password;
        }

        DB::beginTransaction();
        try{

            User::where('id', $user->id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ]);

            DB::commit();

            return redirect()->back()->with('success',__('Your Data Saved Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }


    public function homePage()
    {
        return view('auth.home');
    }

    public function login()
    {
        return view('auth.ulogin');
    }
}
