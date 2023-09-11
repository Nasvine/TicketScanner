<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DashControler extends Controller
{
    public function index_admin(){
        #Ticket 1000f
           #restants
              $ticket_1000_restants = Ticket::where('prix', 1000)->where('status', 'valide')->count();
           #vendus
              $ticket_1000_vendus = Ticket::where('prix', 1000)->where('status', 'nonValide')->count();
        #Ticket 500f
           #restants
              $ticket_500_restants = Ticket::where('prix', 500)->where('status', 'valide')->count();
           #vendus
              $ticket_500_vendus = Ticket::where('prix', 500)->where('status', 'nonValide')->count();
        return view('admin.dash', compact('ticket_1000_restants', 'ticket_1000_vendus', 'ticket_500_restants', 'ticket_500_vendus'));
    }

    public function index_visitor(){
        return view('visitor.dash');
    }
}
