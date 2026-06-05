<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact = $request->validated();
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request){
        $contact = $request->validated();
        Contact::create($contact);
        return redirect('/thanks');
    }

    public function back(Request $request){
        return redirect('/')->withInput($request->all());
    }

    public function thanks()
    {
        return view('thanks');
    }
}
