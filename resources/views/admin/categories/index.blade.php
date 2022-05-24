@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary btn.sm float-right" href="{{route('admin.categories.create')}}">Agregar categoría</a>
    @endcan
    <h1>Lista de Categorías</h1>

@stop

@section('content')

    


   {{--con boostrap  @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
         </div>
    
    @endif --}}

    <div class='card'>
        <div class='card-body'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">

                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                                @endcan
                                
                            </td>
                            <td width="10px">
                                
                                @can('admin.categories.destroy')  

                                    <form action="{{route('admin.categories.destroy', $category)}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                        @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>                          
                                    </form>
                                        
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
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
            'The category and its posts have been removed.',
            'success'
            )
    </script>

@endif
    
    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

        Swal.fire({
        title: 'Are you sure?',
        text: "You will delete all posts in this category!",
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