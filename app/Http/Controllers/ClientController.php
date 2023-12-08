<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;

// class ClientController extends BaseController
// {
//     public function index()
//     {   
//         // $conference = new Conference(1, 'AI threat', 'Call Arnie');
//         $client1 = new Client('6', 'client', 'Vardas','Pavarde');
//         $client2 = new Client('7', 'client', 'Vardenis ','Pavardenis');

//         // $conference->addClient($client1);
//         // $conference->addClient($client2);
//         // $conferences = [$conference];

//         return view('client.conferences');
//         // return view('client.conferences', ['conferences' => $conferences]);
//     }
// }

class ClientController extends Controller
{
    public function index($conferences)
    {
        return view('client.conferences', ['conferences' => $conferences]);
    }

    

    public function showConference($id,$conference)
    {
        
        return view('client.show', ['conference' => $conference, 'id' => $id]);
    }

    // public function registerConference($id)
    // {
    //     // Fetch the conference details using $id
    //     $conference = Conference::find($id);

    //     return view('client.register', ['conference' => $conference]);
    // }
}