@extends('layout')

@section('content')
    <div class="container">
        <div class="bg-white shadow rounded p-5">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <span class="h4">{{ $user->name}}</span>
                <br><br>
                <table class="table">
                    <tr>
                        <th>Nombre: </th>
                        <td>{{ $user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{ $user->email}}</td>
                    </tr>
                    <tr>
                        <th>Roles: </th>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->display_name}}
                            @endforeach
                            
                        </td>
                    </tr>
                </table>   
                @can('edit', $user)
                    <a class="btn btn-primary text-white" href="{{ route('users.edit', $user->id) }} " >Editar</a>
                    <a class="btn btn-danger text-white" href="#" onclick="document.getElementById('delete-user').submit()" >Eliminar</a>
                    <form class="d-none" id="delete-user"   method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf @method('DELETE')
                        <br>
                    </form>
                    
                @endcan
                </div>
        </div>
    </div>
    </div>

@endsection