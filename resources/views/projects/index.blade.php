@extends('layout')

@section('title','Portfolio')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-5 mb-0" >Portfolio</h1>
        @auth
            <a class="btn btn-primary text-white" href="{{ route('projects.create') }}">Crear proyecto</a>
        @endauth
    </div>
    <hr>
    <br>    
    <p class="lead text-secondary">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam commodi nostrum ipsa quod beatae maiores soluta magnam, repudiandae exercitationem accusantium?
    </p>
    <br>
    <ul class="list-group">
        @isset($projects)
            
            @foreach($projects as $project)
                {{--  Impresion como array    
                <li> {{ $projectsItem['title'] }} <small> {{ $loop->last ? 'Es el ultimo' : '' }}</small></li> --}}

                {{--Impresion como objeto  --}}
                <li class="list-group-item border-0 shadow-sm mb-3 align-item-center">
                    <a class=" text-secondary d-flex justify-content-between" href="{{ route('projects.show', $project) }}"> 
                        <span class=" font-weight-bold">{{ $project->title }}</span> 
                        <span class="text-black-50">{{ $project->created_at->format('d/m/Y') }}</span>
                    </a>
                    
                </li>
        
            @endforeach 
        
        @else

            <li>No hay proyectos para mostrar</li>

        @endisset

        {{ $projects->links() }}
    </ul>
</div>   
@endsection