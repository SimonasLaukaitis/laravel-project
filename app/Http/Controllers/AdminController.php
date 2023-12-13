<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;


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

    public function editConference($conferences,$id)
    {   
        $conferenceID = $conferences[$id] ?? null;
        return view('admin.conferenceedit', ['conferenceID' => $conferenceID,'conference' => $conferenceID]);
    }

    // public function updateUser(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'surname' => 'required',
    //         'email' => 'required|email',
    //         'user_type' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // If the validation passes, you can process the form data here
    //     // For example, save the data to the database, update user information, etc.

    //     // After processing, redirect to a success route or view
    //     return redirect()->route('success')->with('success_message', 'User updated successfully!');
    // }

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