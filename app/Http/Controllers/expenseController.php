<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\expensetype;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

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

        $existingEntry = Expense::where([
            ['type_id', $request->input('type')],
            ['created_at', '>=', now()->startOfMonth()],
            ['created_at', '<=', now()->endOfMonth()],
        ])->whereHas('type', function ($query) {
            $query->where('is_monthly', 1);
        })->first();
        if ($existingEntry) {
            return redirect()->back()->withErrors(['message' => 'An entry already exists for this month.']);

        }


        $expense = new expense();
        $expense->user_id = Auth::id();
        $expense->team_id = $request->input('name');
        $expense->type_id = $request->input('type');
        $expense->price = $validatedData['price'];
        $expense->description = $validatedData['description'];
        $expense->created_by = Auth::id();
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
        $type = expensetype::all();

        return view('frontend.edit', compact('entry', 'team', 'type'));
    }

    public function update(Request $request, $id)
    {
        $entry = expense::findOrFail($id);

        $entry->update($request->all());

        $entry->update(['created_by' => auth()->id()]);
        $entry->update(['user_id' => auth()->id()]);


        return redirect()->route('overview.expenditure',);
    }

    public function destroy($id)
    {
        $entry = expense::findOrFail($id);
        $entry->delete();

        return redirect()->route('overview.expenditure');
    }

    public function fetchEntries(Request $request)
    {

        $year = $request->input('year');
        $month = $request->input('month');


        $entries = expense::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();


        $usertype = null;
        if (Auth::check()) {

            $usertype = auth()->user()->user_type;
            $output = [
                'entries' => [],
                'userType' => $usertype,
            ];


            foreach ($entries as $entry) {
                $output['entries'][] = [

                    'name' => ucwords($entry->team->name),
                    'type' => $entry->type->name,
                    'price' => $entry->price,
                    'description' => $entry->description,
                    'created_at' => date('F', strtotime($entry->created_at)),
                    'created_by' => ucwords($entry->user->name),
                    'edit' => route('entry.edit', $entry->id),
                    'delete' => route('entry.destroy', $entry->id),
                    'id' => $entry->id,
                ];
            }

            return response()->json($output);
        }
    }
}
