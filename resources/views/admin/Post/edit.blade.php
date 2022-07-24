@extends('layouts.admin.admin')

@section('styles css')
    <link rel="stylesheet" href="{{asset('css/content-styles.css')}}" type="text/css">

@endsection

@section('titulo', 'Editar Post')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-form-post :categories="$categories" :post="$post" :method="'PUT'"
                         :action="route('admin.posts.update',$post)">
                <x-slot name="title">Editar Post</x-slot>
            </x-form-post>
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
