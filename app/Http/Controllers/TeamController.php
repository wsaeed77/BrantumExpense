<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function showDetails($id)
    {
        // Retrieve team member details based on $name
        $teamMember = Team::where('id', $id)->first();
        $teamExpenses = Expense::where('team_id', $id)->get();


        // Pass $teamMember to the view and display details
        return view('frontend.details', compact('teamMember','teamExpenses'));
    }
}
