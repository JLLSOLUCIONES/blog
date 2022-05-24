@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    <h1>Modificar links de instagram</h1>
@stop

@section('content')

@if (session('info'))
{{--  Generamos una alerta de bootstrap "success" si queremos fondo verde--}}
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

    <div class="card">
        <div class="card-body">
            {!!Form::model($file, ['route' => ['admin.files.update', $file], 'autocomplete' => 'off', 'files' => true, 'method' => 'put'])!!}

                 @include('admin.files.partials.form')

                {!! Form::submit('Actualizar link', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <style>
        .image-wrapper{
            position::relative;
            padding-botton: 56.25%;
        }

        .image-wrapper img{
            position::absolute;
            object-fit: cover;
            width: 60%;
            height:60%;
        }
    </style>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        //Cambiar imagen por defecto
            document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>    


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('info_update')== 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'su link ha sido actualizado',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

@endsection