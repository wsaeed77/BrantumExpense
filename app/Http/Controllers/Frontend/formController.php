<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class formController extends Controller
{
    public function dashboard()
    {
        $teams = Team::pluck('name', 'id');
        return view('frontend.form', compact('teams'));
    }

}
