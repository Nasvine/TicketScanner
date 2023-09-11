<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        //dd($users);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function index_scanner()
    {
        $tickets = Ticket::all();
        //dd($users);
        return view('admin.tickets.index_scanner');
    }

    public function store_scanner(Request $request)
    {
        $ticket_identifiant = $request->get('ticket_identifiant');
       // dd(stristr((string)$ticket_identifiant, '#'));
        if(stristr((string)$ticket_identifiant, '#')){
            //dd('ok');
                $ticket = Ticket::where('ticket_identifiant', $ticket_identifiant)->first();
                $ticket_status = $ticket->status;
                 if($ticket_status == 'valide'){
                   $tab = array(
                       'status' => 'nonValide'
                   );
                   //dd($ticket->id);
                   Ticket::where('id', $ticket->id)->update($tab );   
                   Alert::success('Scannage de Ticket effectué avec succès', 'Bienvenue à la fête ! ! !');
                   return redirect()->back();
                 } else{
                   Alert::error('Scannage refusé', 'Ticket non valide.');
                   return redirect()->back();
                 }
        } else{
            Alert::error('Scannage refusé', 'Scannage non effectué');
            return redirect()->back();
        }
        
    }

    public function store(Request $request)
    {
        $nombre_de_ticket = (int)$request->get('nbr_of_ticket');

        //$code = QrCode::format('png')->size(200)->generate('toto');
        //dd($code);

        for($i=1; $i <= $nombre_de_ticket; $i++){
            
            $prix = (int)$request->get('prix');
            $ticket_identifiant = "#".rand(1000, 50000);

            $image = QrCode::size(200)->generate($ticket_identifiant);
            //'data:image/png;base64,'.base64_encode(QrCode::format('png')->size(500)->generate($ticket_identifiant));
            Ticket::create(
                [
                    'ticket_identifiant' => $ticket_identifiant,
                    'prix'               => $prix,
                    'user_id'            => Auth::id(),
                    'code_qr'            => $image,
                ]);

            }
        $message = $nombre_de_ticket."  "." ticket(s) crée(s) avec succès.";   
        Alert::success('Insection', $message);
        return redirect()->back();
    }
}
