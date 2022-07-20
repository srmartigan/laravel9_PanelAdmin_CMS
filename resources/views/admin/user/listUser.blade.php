@extends('layouts.admin.admin')
@section('titulo', 'Listado de Usuarios')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- alerts success and error -->
                @if (session('success'))
                    <x-alert type="success" :message="session('success')"></x-alert>
                @endif
                @if (session('error'))
                    <x-alert type="error" :message="session('error')"></x-alert>
                @endif


                <div class="card">
                    <div class="card-header">
                        <h2>Listado Usuarios
                            <a href="{{route('admin.users.create')}}" class="btn btn-primary float-right">Nuevo Usuario</a>
                        </h2>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped" id="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="btn btn-warning btn-sm">Editar</a>

                                        <!-- form boton eliminar -->
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                              style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('table').DataTable();
        });
    </script>
@endsection
