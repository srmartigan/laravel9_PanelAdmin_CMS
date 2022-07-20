@extends('layouts.admin.admin')

@section('titulo', 'Crear Categoría')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <x-form-category  :method="'POST'" :action="route('admin.categories.store')" >
                     @slot('title', 'Crear Categoría')
               </x-form-category>
            </div>
        </div>
    </div>
@endsection
