@extends('layout')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1>Correos</h1>
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
                        <th>Asunto</th>
                        <th>Contenido</th>
                        <th>Notas</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>    
                <tbody>
                    @foreach ($emails as $email)
                        <tr> 
                            <td>{{  $email->id }} </td>
                            
                            @if($email->user_id)
                                <td><a href="{{ route('users.show', $email->user_id)}}">{{ $email->user->name }}</td>
                                <td> {{ $email->user->email}} </td>
                            @else
                                <td>{{ $email->name }} </td>
                                <td>{{ $email->email }} </td> 
                           @endif    
                            <td>{{ $email->subject }}</td>
                            <td>{{ $email->content }}</td>
                            <td>{{   ($email->note->body) ?? 'no tiene nota' }}</td>
                            <td> 
                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-primary text-white" href="{{ route('emails.edit', $email->id ) }}">Editar</a>
                                    <a class="btn btn-danger text-white ml-1" href="#" onclick='document.getElementById("delete-project").submit()'>Eliminar</a>
                                </div>
                                <form class="d-none" id="delete-project" method="POST" action="{{ route('emails.destroy', $email->id )}}">
                                    @csrf @method('DELETE')
                                    <br>
                                
                                </form>     
                            </td>
                            
                        </tr>
                    @endforeach
                    {!! $emails->fragment('hash
                    ')->appends(request()->query())->links('pagination::bootstrap-4')!!}
                </tbody>    
            </table>     


        </div>
    </div>
     
</div>   
@endsection