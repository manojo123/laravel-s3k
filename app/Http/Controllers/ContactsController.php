<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactsController extends Controller
{

    public function __construct(){
        $this->middleware('auth'/*, ['except' => [
            'index',
            'show'
        ]]*/);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::
            where(['user_id' => auth()->id()])
            ->simplePaginate(3);

        return view('contacts.index', compact('contacts')); // ['contacts' => $contact]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        Contact::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        if (Gate::denies('view', $contact)) {

            return redirect('/contacts')
                ->withErrors("Dont hack me plz");
                
        }
        
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validateForm($request);

        $contact->update([
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect('/contacts/'.$contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();        //

        return back();
    }

    public function validateForm($request){
        return $request->validate([
            'subject' => 'required|min:2|max:255',
            'message' => 'required|min:10|max:1024'
        ],[
            'subject.required' => 'Campo Asunto Obligatorio',
            'subject.min' => 'El campo debe tener mas q 2 chars'
        ]);
    }
}
