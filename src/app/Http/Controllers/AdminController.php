<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.contacts', compact('contacts'));
    }
}

