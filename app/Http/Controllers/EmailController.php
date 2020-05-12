<?php

namespace App\Http\Controllers;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\UpdateRequestEmail;
use App\Note;
use App\Repositories\EmailsInterface;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $email;

    public function __construct(EmailsInterface $email)
    {
 
        $this->email = $email;
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }

    public function index()
    {
        // Cache::tags('emails')->flush();
        // die();
        $emails = $this->email->getPaginated();
     
            
        return view('emails.index',compact('emails'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.exit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = $this->email->findById($id);    
    
       return view('emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestEmail $request, $id)
    {
       $this->email->update($id, $request); 
       // return back();
       return redirect()->route('emails.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->email->destroy($id);

      return redirect()->route('emails.index');  
    }

}
