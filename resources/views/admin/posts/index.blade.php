@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo post</a>


    <h1>Listado de post</h1>
@stop

@section('content')

       @livewire('admin.posts-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@if (session('info')== 'ok')
    <script>
         Swal.fire(
            'Deleted!',
            'The post have been removed.',
            'success'
            )
    </script>

@endif
    
    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            this.submit();
        }
        })

        });

    </script>
@stop