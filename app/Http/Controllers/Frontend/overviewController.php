<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\formfill;
use Illuminate\Http\Request;

class overviewController extends Controller
{

    public function dashboard()
    {
        return view('frontend.overview');
    }
}
