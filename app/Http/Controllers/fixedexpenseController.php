<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fixedexpense;
use Illuminate\Support\Facades\Auth;

class fixedexpenseController extends Controller
{
     public function show(){

         $fixexpense = fixedexpense::all();


         return view("frontend.fixedexpense",compact('fixexpense'));


     }
     public function save(Request $request){

         $rules = [
             'name' => 'required',
             'price' => 'required',
         ];


         $messages = [
             'price.required' => 'Price field is required.',
             'name.required' => 'Description field is required.',
         ];

         $validatedData = $request->validate($rules, $messages);

         $fixedexp = new fixedexpense();

         $fixedexp->name = $request->input('name');
         $fixedexp->price=$validatedData['price'];
         $fixedexp->is_paid = false;
         $fixedexp->user_id= auth::id();
         $fixedexp->save();

         return redirect()->back()->with('success', 'Values added successfully!');
     }

     public function update(Request $request,$id){

         $fix = fixedexpense::findOrFail($id) ;

         $fix->update(['is_paid'=> 1]) ;

         $fix->save();

         return redirect()->back()->with('success', 'Values added successfully!');
     }

}
