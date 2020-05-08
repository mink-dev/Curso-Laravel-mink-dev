<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Project;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    
    public function index()
    {

        //usamos query builder o constructor de consultas
        //$portfolio = DB::table('projects')->get(); 



        return view('projects.index', [
        
            'projects' => Project::latest('updated_at')->paginate()
        
        ]);
    }

    public function show(Project $project){
       
        
        return view('projects.show', [

            'project' => $project

        ]);   
     }

     public function create(){
         $project = new Project();
         return view('projects.create',[
             'project' => $project
         ]);
     }

     public function store(SaveProjectRequest $request){

        
        Project :: create($request->validated());
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito');
     }

     public function edit(Project $project){

        return view('projects.edit', [
            'project' => $project
        ]);

     }

     public function update(Project $project, SaveProjectRequest $request){
     
        $project->update( $request->validated() );
            
         return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito.');

     }

     public function destroy(Project $project){
          
            $project->delete();

        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');   
     }
}
