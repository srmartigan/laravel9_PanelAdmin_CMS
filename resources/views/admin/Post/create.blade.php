@extends('layouts.admin.admin')

@section('titulo', 'Crear Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <x-form-post :categories="$categories" :action="route('admin.posts.store')">
                    <x-slot name="title">Crear Post</x-slot>
               </x-form-post>
            </div>
        </div>
    </div>
@endsection
