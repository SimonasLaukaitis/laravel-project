<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conference;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


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


    public function deleteConference($conferences, $id)
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

    public function putUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'user_type' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.userlist')->with('success', 'User updated successfully');
    }

    //Updating conference
    public function updateConference(Request $request, $id)
    {
        $validatedData = $request->validate([
            'location' => 'required',
            'event_name' => 'required',
            'event_date' => 'required|date',
            'info' => 'required',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update($validatedData);

        return redirect()->route('admin.conferencelist')->with('success', 'Conference updated successfully');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required',
            'event_name' => 'required',
            'event_date' => 'required|date',
            'info' => 'required',
        ]);

        $conference = Conference::create($validatedData);

        return redirect()->route('admin.conferencelist')->with('success', 'Conference created successfully');
    }

    public function userregistration()
    {
        return view('admin.userregistration');
    }

    public function createUser(Request $request)
    {
        // dd($request->all()); 
        if ($request->isMethod('post')) {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                // Add other fields as needed
            ]);

            // Set the default value for user_type
            $validatedData['user_type'] = 'client';

            // Create a new user
            $user = User::create($validatedData);
            

            // Optionally, you can redirect to a user edit page or any other page
            return redirect()->route('admin.userregistration', ['id' => $user->id])->with('success', 'User created successfully');
        }

        // If it's a GET request, show the registration form
        return view('admin.userregistration');
    }
}
