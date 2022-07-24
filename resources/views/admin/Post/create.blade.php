@extends('layouts.admin.admin')

@section('styles css')
    <link rel="stylesheet" href="{{asset('css/content-styles.css')}}" type="text/css">
@endsection

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

@section('scripts')
    <!-- Ckeditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
