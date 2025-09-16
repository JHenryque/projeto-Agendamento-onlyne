<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PlansController extends Controller
{
    //

    public function index(): View
    {
        return view('plans.plan-usurario');
    }
}
