@extends('layouts.admin.admin')

@section('titulo', 'Crear Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h4 class="text-center"><strong> Crear Post </strong></h4></div>

                    <div class="card-body col-8 offset-2 text-center">
                        <form method="POST" action="{{ route('admin.posts.store') }}">
                            @method('POST')
                            @csrf


                            <div class="row mb-12">
                                <label for="title">Titulo</label>
                                <input id="title"
                                       type="text"
                                       class="form-control
                                       @error('title') is-invalid @enderror"
                                       name="title" required autofocus autocomplete="off"
                                       placeholder="introduce Titulo">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-12">
                                <label for="slug">slug</label>
                                <input id="slug"
                                       type="text"
                                       class="form-control
                                       @error('slug') is-invalid @enderror"
                                       name="slug">

                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-12">
                                <label for="content">Contenido</label>
                                <textarea id="content"
                                          class="form-control"
                                          @error('content') is-invalid @enderror
                                          name="content" required autofocus autocomplete="off"></textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-12">
                                <label for="category_id">Categoría</label>
                                <select id="category_id"
                                        class="form-control
                                        @error('category_id') is-invalid @enderror"
                                        name="category_id" required autofocus>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == 1 ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br/>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-success">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
