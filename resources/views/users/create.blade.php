@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @include('partials.validation-errors')
            </div>
        </div>
        <div class="row">
            <div class="col-11 col-sm-10 col-md-6 mx-auto">
                <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('users.store') }}">
                    <h1 class="display-5">Crear nuevo usuario</h1>
                    <hr>
                    <br>
                    @include('users.form', ['usr' => new App\User])
                    <button class="btn btn-primary text-white btn-lg btn-block">Guardar</button>
                    <a class="btn btn-link btn-block" href="{{ route('users.index') }}"> 
                        Cancelar
                    </a>
                </form>        
            </div>   
        </div>
    </div>
        
            

@endsection         
