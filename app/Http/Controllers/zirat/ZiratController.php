<?php

namespace App\Http\Controllers\zirat;

use App\Http\Controllers\Controller;
use App\Models\Ziarat;
use App\Models\Zirat;
use Illuminate\Http\Request;

class ZiratController extends Controller
{
   public function index()
   {
    $zirats = Zirat::get();
     return view('ziarat.index' , compact('zirats'));
   }

   public function create()
   {
       return view('ziarat.create');
   }


   public function store(Request $request)
{
    $request->validate([
        'zirat_name' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    Zirat::create([
        'name' => $request->zirat_name,
        'price' => $request->price,
    ]);

    return redirect()->route('ziarat.index')->with('success', 'Zirat added successfully.');
}

public function getZiaratPrice($name)
    {
        $ziarat = Zirat::where('name', $name)->first();

        if ($ziarat) {
            return response()->json(['price' => $ziarat->price]);
        } else {
            return response()->json(['price' => 0]); // Or handle error appropriately
        }
    }

    public function edit($id)
    {
        $zirat =Zirat::findOrFail($id);
        return view('ziarat.edit', compact('zirat'));
    }
}
