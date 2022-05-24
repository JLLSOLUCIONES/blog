@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    <h1>Crear link instagram</h1>
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
            {!!Form::open(['route' => 'admin.files.store', 'autocomplete' => 'off', 'files' => true])!!}

                    @include('admin.files.partials.form')

                {!! Form::submit('Crear link', ['class'=>'btn btn-primary']) !!}

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

       


@endsection