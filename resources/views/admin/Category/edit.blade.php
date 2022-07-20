@extends('layouts.admin.admin')

@section('titulo', 'Editar Categoría')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <x-form-category  :method="'PUT'" :action="route('admin.categories.update', $category->id)"
                                  :value_name="$category->name"
                                  :value_description="$category->description">
                    @slot('title', 'Editar Categoría')
                </x-form-category>
            </div>
        </div>
    </div>
@endsection
