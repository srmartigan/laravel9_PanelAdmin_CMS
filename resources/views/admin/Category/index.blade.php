@extends('layouts.admin.admin')

@section('titulo', 'Listado Categorías')

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
                        <h2>Listado Categorias
                            <a href="{{route('admin.categories.create')}}" class="btn btn-primary float-right">Nueva Categoria</a>
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
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                           class="btn btn-warning btn-sm">Editar</a>

                                        <!-- form botón eliminar -->
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
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
