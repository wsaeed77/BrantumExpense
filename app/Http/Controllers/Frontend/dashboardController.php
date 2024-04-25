<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\expense;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function dashboard()
    {

        $teams = Team::all();

        // Fetch total expenses for each team using DB query
        $teamExpenses = DB::table('expenses')
            ->select('team_id', DB::raw('SUM(price) as total_expense'))
            ->groupBy('team_id')
            ->get();

        // Merge total expenses with teams data
        $teamsWithExpenses = $teams->map(function ($team) use ($teamExpenses) {
            $team->total_expense = $teamExpenses->where('team_id', $team->id)->first()->total_expense ?? 0;
            return $team;
        });

        return view('frontend.dashboard', compact('teamsWithExpenses'));
    }

}
