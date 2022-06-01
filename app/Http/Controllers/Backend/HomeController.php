<?php

namespace App\Http\Controllers\Backend;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request){
        $tickets = Ticket::orderBy('updated_at', 'DESC')->get();
        return view('backend.pages.dashboard', compact('tickets'));
    }
    public function changelog(Request $request){
        $tickets = Ticket::orderBy('updated_at', 'DESC')->get();
        return view('backend.pages.changelog', compact('tickets'));
    }
    
}
