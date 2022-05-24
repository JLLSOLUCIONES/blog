@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=>'Ingrese el nombre de la categoría']) !!}

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
        
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' =>'form-control', 'placeholder'=>'Ingrese el slug de la categoría', 'readonly']) !!}
            
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            
            
            
            </div>

            {!! Form::submit('Actualizar categoría', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });    
    </script>    

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('info_create')== 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'La categoría ha sido salvada',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

@if (session('info_update')== 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'La categoría ha sido actualizada',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

@endsection