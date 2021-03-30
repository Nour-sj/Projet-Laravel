<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function send(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->date = date('Y-m-d H:i:s');

        $contact->save();
        return redirect(route('contact'))->with('successMsg', 'Votre message a bien été envoyé, Vous receverez une réponse rapidement.');

    }
}
