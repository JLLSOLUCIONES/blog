<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder= "Ingrese el nombre de un post">
    </div>
    @if ($posts->count())
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td>
                                @if ($post->status==2)
                                    pulicado
                                @else
                                    borrador
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.posts.destroy', $post)}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card footer">
            {{$posts->links()}}
        </div>
    
        @else
            <div class="card-body">
                <strong>No hay ningún registro ...</strong>
            </div>
    @endif

 
</div>
