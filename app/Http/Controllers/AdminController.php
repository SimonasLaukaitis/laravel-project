<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


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

    public function userEdit($users, $id)
    {
        $usersID = $users[$id] ?? null;
        return view('admin.useredit', ['user' => $usersID]);
    }

    public function showConferences($conferences)
    {
        return view('admin.conferencelist', ['conferences' => $conferences]);
    }

    public function newConference()
    {
        return view('admin.newconference');
    }

    public function editConference($conferences, $id)
    {
        $conferenceID = $conferences[$id] ?? null;
        return view('admin.conferenceedit', ['conference' => $conferenceID]);
    }


    public function deleteConference($conferences,$id)
    {
       $conference = Conference::find($id);
    
       if ($conference !== null) {
           $conference->delete();
           return redirect()->route('admin.conferencelist')->with('success', 'Conference deleted successfully');
       } else {
           return redirect()->route('admin.conferencelist')->with('error', 'Conference not found');
       }
    }


    public function storeConference(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'date' => 'required|date',
            'user_type' => 'required',
        ]);

        // return redirect()->route('admin.conferencelist')->with('success', 'Conference created successfully');
        return redirect()->route('success')->with('success', 'Conference created successfully');
    }
}
