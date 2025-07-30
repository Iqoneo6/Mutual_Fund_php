<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Client;
use App\GeneralSetting;

class ClientController extends Controller
{
    
    public function index() {
        $clients = User::latest()->get();
        $site_title = GeneralSetting::value('title');
        return view('admin.clients.index', compact('clients', 'site_title'));
    }

    public function create()
    {
        $site_title = GeneralSetting::value('title');
        return view('admin.clients.create', compact('site_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6',
            'ID_Number' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'],
       ], [
            'ID_Number.regex' => 'Please enter a valid PAN number (e.g., ABCDE1234F).'
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => Hash::make($request->password),
            'ID_Number'  => $request->ID_Number,
            'aadhar_number' => $request->aadhar_number,
            'dob'   => $request->dob,
             'city'          => $request->city,
            'state'         => $request->state,
            'zip'        => $request->zip,
            'verifyToken' => Str::random(40),
            'reference' => Str::random(12),
            'address'    => $request->address,
            'password'   => Hash::make($request->password),
            'status'     => 1, 
        ]);

        return redirect()->back()->with('success', 'Client added successfully.');
    }
}
