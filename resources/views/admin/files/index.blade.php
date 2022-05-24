@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    @can('admin.files.create')
        <a class="btn btn-secondary btn.sm float-right" href="{{route('admin.files.create')}}">Nuevo link</a>
    @endcan
    

    <h1>Listado de links de Instagram</h1>
@stop

@section('content')

    {{-- @if (session('info'))
            <div class="alert alert-danger">
            <strong>{{session('info')}}</strong>
        </div>
    @endif --}}
    
 
    <div class="card">
        <div class="card-body ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Link</th>
                        <th>Imágen</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{$file->id}}</td>
                            <td>{{$file->link}}</td>
                            <td><img width="70px" src="{{Storage::url($file->url)}}"/></td>
                            <td width="10px">
                                @can('admin.files.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.files.edit', $file)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.files.destroy')
                                    <form action="{{route('admin.files.destroy', $file)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if (session('eliminar')== 'ok')
    <script>
         Swal.fire(
            'Deleted!',
            'The link have been removed.',
            'success',
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('info_store')== 'ok')
        <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'su link ha sido salvado',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif

    @if (session('info_create')== 'nok')
        <script>
           Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Algo salió mal!',
            footer: '<a>Solo puedes tener 12 links. Puedes modificarlos, si lo prefieres ...</a>'
            })
        </script>
    @endif

@stop
