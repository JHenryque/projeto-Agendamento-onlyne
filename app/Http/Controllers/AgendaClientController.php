<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaClientController extends Controller
{
    //
    public function agendaClient():View
    {
        return view('client.agenda-client');
    }
}
