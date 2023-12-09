<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 


class WorkerController extends Controller
{
    public function index($conferences)
    {
        return view('worker.conferences', ['conferences' => $conferences]);
    }

    public function show($conferences, $id)
    {   
        $conferenceID = $conferences[$id] ?? null;
        return view('worker.show', ['conferenceID' => $conferenceID, 'conferences' => $conferenceID]);
    }

}