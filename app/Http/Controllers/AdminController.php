<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.menu');
    }

     public function userList($users)
    {   
        return view('admin.userlist', ['users' => $users]);
    }

    public function userEdit($users,$id)
    {   
        $usersID = $users[$id] ?? null;
        return view('admin.useredit', ['userID' => $usersID,'user' => $usersID]);
    }

    public function showConferences($conferences)
    {   
        return view('admin.conferencelist', ['conferences' => $conferences]);
    }

    public function newConference()
    {   
        return view('admin.newconference');
    }

    // public function show($conferences, $id)
    // {   
    //     $conferenceID = $conferences[$id] ?? null;
    //     return view('client.show', ['conferenceID' => $conferenceID, 'conferences' => $conferenceID]);
    // }

    // public function register($conferences, $id)
    // {   
    //     $conferenceID = $conferences[$id] ?? null;
    //     return view('client.register', ['conferenceID' => $conferenceID, 'conferences' => $conferenceID]);
    // }

}