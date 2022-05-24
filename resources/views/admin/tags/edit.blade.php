@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')


      <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

                @include('admin.tags.partials.form')

                {!! Form::submit('Actualizar etiqueta', ['class'=>'btn btn-primary']) !!}

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
        title: 'La etiqueta ha sido salvada',
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
        title: 'La etiqueta ha sido actualizada',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

@endsection