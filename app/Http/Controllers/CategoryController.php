<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::get();

        return view('category.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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

            'name' => 'required'
        ]);

        DB::beginTransaction();
        try{

            Category::create([

                'name' => $request->name
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Category::where('uid', $id)->first();

        return view('category.edit',compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required'
        ]);

        DB::beginTransaction();
        try{

            $detail = Category::where('uid', $id)->first();

            Category::where('id', $detail->id)->update([

                'name' => $request->name
            ]);

            DB::commit();

            return redirect()->back()->with('success',__('Your Data Updated Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {        
        $this->validate($request, [

            'category_id' => 'required'
        ]);

        DB::beginTransaction();
        try{


            Category::where('id', $request->category_id)->delete();

            DB::commit();

            return redirect()->back()->with('success',__('Your Data Deleted Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }
}
