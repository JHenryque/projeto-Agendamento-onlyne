<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class ServicesController extends Controller
{
    //

    public function index(string $logomarca, string $id):View
    {

      return view('services.service', [])
    }
}
