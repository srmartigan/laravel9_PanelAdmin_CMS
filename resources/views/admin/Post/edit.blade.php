@extends('layouts.admin.admin')

@section('titulo', 'Editar Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <x-form-post :categories="$categories" :post="$post" :method="'PUT'" :action="route('admin.posts.update',$post)">
                    <x-slot name="title">Editar Post</x-slot>
                </x-form-post>
            </div>
        </div>
    </div>
@endsection
