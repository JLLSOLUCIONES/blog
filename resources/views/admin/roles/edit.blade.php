@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

       <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('info')== 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'El nuevo rol ha sido salvado',
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
        title: 'El nuevo rol ha sido actualizado',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

@stop