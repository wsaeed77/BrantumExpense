<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\expense;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class expenseController extends Controller
{

    public function store(Request $request)
    {

        $rules = [
            'price' => 'required',
            'description' => 'required|string',
        ];


        $messages = [
            'price.required' => 'Price field is required.',
            'description.required' => 'Description field is required.',
        ];

        $validatedData = $request->validate($rules, $messages);


        $expense = new expense();
        $expense->user_id=Auth::id();
        $expense->team_id = $request->input('name');
             $expense->type = $request->input('type');
        $expense->price = $validatedData['price'];
        $expense->description = $validatedData['description'];
        $expense->created_by=Auth::id();
        $expense->save();

        return redirect()->back()->with('success', 'Values added successfully!');
    }

    public function overview()
    {
        $entries = expense::all();
                return view('frontend.overview', compact('entries'));
    }

    public function edit($id)
    {
        $entry = expense::findOrFail($id);
        $team = Team::all();

        return view('frontend.edit', compact('entry','team'));
    }

    public function update(Request $request, $id)
    {
        $entry = expense::findOrFail($id);

        $entry->update($request->all());

        $entry->update(['created_by' => auth()->id()]);
        $entry->update(['user_id'=>auth()->id()]);


        return redirect()->route('overview.expenditure',);
    }

    public function destroy($id)
    {
        $entry = expense::findOrFail($id);
        $entry->delete();

        return redirect()->route('overview.expenditure');
    }
}
