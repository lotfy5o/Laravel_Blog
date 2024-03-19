<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\StoreContactReq;

class ContactController extends Controller
{
    public function store(StoreContactReq $request){
        $data = $request->validated();
        Contact::create($data);

        return back()->with('status-message', 'Your Message Sent Successfully');
    }
}
