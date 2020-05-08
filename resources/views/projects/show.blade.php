@extends('layout')

@section('title','Portafolio | ' . $project->title)

@section('content')
<div class="container">
    <div class="bg-white shadow rounded p-5">    
        <h1 class="display-5">{{ $project->title }}</h1>
        <p class="text-secondary"> 
            {{ $project->description}}
        </p>
        <p class="text-black-50"> 
            {{ $project->created_at->diffForHumans() }}
        </p>    
        <div class="d-flex justify-content-between">
            
            <a href="{{ route('projects.index') }}"> 
                Regresar
            </a>
            @auth

            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary text-white" href="{{ route('projects.edit', $project) }}">Editar</a>
                <a class="btn btn-danger text-white" href="#" onclick='document.getElementById("delete-project").submit()'>Eliminar</a>
            </div>
                <form class="d-none" id="delete-project" method="POST" action="{{ route('projects.destroy', $project)}}">
                    @csrf @method('DELETE')
                    <br>
                
                </form>  
                
            @endauth
        </div>
    </div>
</div>
@endsection