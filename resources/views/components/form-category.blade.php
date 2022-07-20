@props(['method', 'action', 'value_name' => '', 'value_description' => ''])

<div class="card">
    <div class="card-header"><h4 class="text-center"><strong> {{$title}} </strong></h4></div>

    <div class="card-body col-8 offset-2 text-center">
        <form method="POST" action="{{$action}}">
            @csrf
            @method($method)

            <div class="row mb-12">
                <label for="name">Nombre Categoria</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" required autofocus autocomplete="off"
                       value="{{$value_name}}">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row mb-12">
                <label for="description">Descripción</label>
                <input id="description" type="text"
                       class="form-control @error('description') is-invalid @enderror" name="description"
                       value="{{$value_description}}">

                @error('description')
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
