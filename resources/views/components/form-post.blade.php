@props(['categories', 'post' => 'null', 'action' => '', 'method' => 'POST'])

<div class="card">
    <div class="card-header"><h4 class="text-center"><strong> {{ $title }}</strong></h4></div>

    <div class="card-body col-8 offset-2 text-center">
        <form method="POST" action="{{$action}}">
            @method($method)
            @csrf


            <div class="row mb-12">
                <label for="title">Titulo</label>
                <input id="title"
                       type="text"
                       class="form-control
                                       @error('title') is-invalid @enderror"
                       name="title" required autofocus autocomplete="off"
                       placeholder="introduce Titulo"
                       value="{{ old('title', $post->title ?? '') }}">


                @error('title')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="row mb-12 mt-4">
                <label for="slug">slug</label>
                <input id="slug"
                       type="text"
                       class="form-control
                       @error('slug') is-invalid @enderror"
                       name="slug"
                       placeholder="introduce slug"
                       value="{{ old('slug', $post->slug ?? '') }}">

                @error('slug')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="row mb-12 mt-4">
                <label for="editor">Contenido</label>
            </div>
            <textarea id="editor" name="content" rows="30" cols="50">{{ $post->content ?? ''}}</textarea>

            <div class="row mb-12 mt-4">
                <label for="category_id">Categoría</label>
                <select id="category_id"
                        class="form-control
                                        @error('category_id') is-invalid @enderror"
                        name="category_id" required autofocus>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if(isset($post->category_id))
                                    {{$post->category_id == $category->id ? 'selected' : '' }}
                                @endif
                        >
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
