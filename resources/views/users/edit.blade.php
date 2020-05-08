@extends('layout')

@section('content')
        
    <div class="container">
        <div class="row">
            <div class="col-11 col-sm-10 col-md-6 mx-auto">
                @if( session()->has('info') ) 
                    <div class="alert alert-success">
                        {{ session('info') }}    
                        <a class="link align-right" href="{{ route('users.index') }}">Regresar</a>
                         
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                @include('partials.validation-errors')
            </div>
        </div>
        <div class="row">
            <div class="col-11 col-sm-10 col-md-6 mx-auto">
                {{-- @include('partials.validation-errors') --}}
                <br>
                <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('users.update', $usr) }}">
                    @method('PATCH')
                    <h1 class="display-5">Editar Usuario</h1>
                    <hr>
                    <br>
                    @include('users.form')
                    <button class="btn btn-primary text-white btn-lg btn-block">Actualizar</button>
                    <a class="btn btn-link btn-block" href="{{ route('users.index') }}"> 
                        Cancelar
                    </a>
    
                </form>
            </div>
        </div>
    </div>













@endsection