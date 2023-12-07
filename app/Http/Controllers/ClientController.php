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
    public function index()
    {
        $conferences = [
            1 => [
                'location' => 'Vilnius',
                'event_name' => 'Christmas Conference',
                'registered_users' => [
                    'Jonas Jonaitis',
                    'Petras Petraitis'
                ],
                'event_date' => '1990-12-25'
            ],
            2 => [
                'location' => 'Riga',
                'event_name' => 'Baltic Tech Summit',
                'registered_users' => [
                ],
                'event_date' => '2023-09-15'
            ],
            3 => [
                'location' => 'London',
                'event_name' => 'AI Innovation Forum',
                'registered_users' => [
                    'Jonas Jonaitis',
                    'Petras Petraitis'
                ],
                'event_date' => '2023-11-10'
            ],
            4 => [
                'location' => 'New York',
                'event_name' => 'Tech Expo',
                'registered_users' => [
                    'Jonas Jonaitis',
                    'Petras Petraitis'
                ],
                'event_date' => '2024-03-25'
            ],
            5 => [
                'location' => 'San Francisco',
                'event_name' => 'Developer Conference',
                'registered_users' => [
                    'Jonas Jonaitis',
                    'Petras Petraitis'
                ],
                'event_date' => '2024-06-05'
            ],
            // You can continue adding more conferences here following the same format
        ];
        

        return view('client.conferences', ['conferences' => $conferences]);
    }

    // public function showConference($id)
    // {
    //     // Fetch the conference details using $id
    //     $conference = Conference::find($id);

    //     return view('client.show', ['conference' => $conference]);
    // }

    // public function registerConference($id)
    // {
    //     // Fetch the conference details using $id
    //     $conference = Conference::find($id);

    //     return view('client.register', ['conference' => $conference]);
    // }
}