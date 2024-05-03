<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\expensetype;
use App\Models\Team;
use Carbon\Carbon;
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
        //FIXED EXPENSES DISPLAY

        $currentMonth = Carbon::now()->month;
        $type = expensetype::all()->where('is_monthly', 1);

        $monthlyExpenses = Expense::whereHas('type', function ($query) {
            $query->where('is_monthly', 1);
        })->whereMonth('created_at', '=', $currentMonth)
            ->get();

        $sohailTeamId = 'sohail';
        $mang = Team::with(['expenses' => function ($query) use ($currentMonth) {
            $query->whereMonth('created_at', '=', $currentMonth);
        }])
            ->withSum('expenses', 'price')
            ->where('name', $sohailTeamId)
            ->get();

        $managertotal = null;
        foreach ($mang as $manager) {

            $managertotal += $manager->expenses_sum_price;
        }

        return view('frontend.dashboard', compact('teamsWithExpenses', 'total', 'type', 'monthlyExpenses', 'managertotal'));
    }

}
