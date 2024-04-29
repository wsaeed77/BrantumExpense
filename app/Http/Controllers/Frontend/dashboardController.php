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

        $teamExpenses = Team::with('expenses')
            ->withSum('expenses', 'price')
            ->get(['id', 'name']);




        $teamsWithExpenses = $teams->map(function ($team) use ($teamExpenses) {
            $teamExpense = $teamExpenses->firstWhere('id', $team->id);
            $team->expenses_sum_price = $teamExpense ? $teamExpense->expenses_sum_price : 0;
            return $team;
        });

        $currentMonthExpenses = Expense::getCurrentMonthExpenses();


        $total = 0;
        foreach ($currentMonthExpenses as $expense) {
            $total += $expense->price;
        }


        return view('frontend.dashboard', compact('teamsWithExpenses','total'));
    }

}
