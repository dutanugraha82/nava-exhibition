<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeCT extends Controller
{
    public function index(){
        $tickets = Tickets::all();
        return view('index', compact('tickets'));
    }
}
