<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 


class ClientController extends Controller
{
    public function index($conferences)
    {
        return view('client.conferences', ['conferences' => $conferences]);
    }

    public function show($conferences, $id)
    {   
        $conferenceID = $conferences[$id] ?? null;
        return view('client.show', ['conferenceID' => $conferenceID, 'conferences' => $conferenceID]);
    }

    public function register($conferences, $id)
    {   
        $conferenceID = $conferences[$id] ?? null;
        return view('client.register', ['conferenceID' => $conferenceID, 'conferences' => $conferenceID]);
    }

}