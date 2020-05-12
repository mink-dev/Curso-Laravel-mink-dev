@extends('layout')

@section('content')
 
    <div class="container">
        
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1>Usuarios</h1>
            </div>
            <div class="col-md-5">
                <a class="btn btn-success" href="{{ route('users.create')}}">
                    Crear nuevo usuario
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table bg-white shadow rounded">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Notas</th>
                            <th>Etiquetas</th>
                            
                            <th>Actividades</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @foreach ($users as $user)
                            <tr> 
                                <td>{{ $user->id }} </td>
                                <td>{{ $user->name }} </td>
                                <td>{{ $user->email }} </td>
                                <td>    
                                    {{ $user->present()->roles() }}
                                </td>
                                <td>
                                     {{  $user->present()->notes()  }}
                                </td>
                                <td>
                                    {{  $user->present()->tags()  }}
                               </td>     
                                <td> 
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary text-white" href="{{ route('users.edit', $user->id ) }}">Editar</a>
                                        <a class="btn btn-danger text-white" href="#" onclick='document.getElementById("delete-project").submit()'>Eliminar</a>
                                    </div>
                                    <form class="d-none" id="delete-project" method="POST" action="{{ route('users.destroy', $user->id )}}">
                                        @csrf @method('DELETE')
                                        <br>
                                    
                                    </form>     
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>    
                </table>     


            </div>
        </div>
         
    </div>           
@endsection