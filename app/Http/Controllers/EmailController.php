<?php

namespace App\Http\Controllers;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\UpdateRequestEmail;
use App\Note;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }

    public function index()
    {
        
        $key = 'emails.all.'. request('page', 1); //por default si no hay valor la pagina sera 1
        
        $emails = Cache::rememberForever($key, function(){
           return Email::with(['user', 'note', 'tags'])
                    ->orderBy('created_at', request('sorted', 'desc'))
                    ->paginate(10);
                
        });
            
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
        $email = Cache::rememberForever('email.{$id}', function() use($id) {
            return $email = Email::findOrFail($id);    
       }); 

       

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
            $email = Email::findOrFail($id);
            $email->update($request->all());
            Cache::flush();   
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();

        Cache::flush();

      return redirect()->route('emails.index');  
    }

}
