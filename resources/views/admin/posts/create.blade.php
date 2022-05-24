@extends('adminlte::page')

@section('title', 'Lara Martina')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!!Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true])!!}

                {{-- Añadiendo una loinea en el observer nos evitamos enviar esto desde el formulario y asi no pueden piratearlo
                {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}} 
                
                @include('admin.posts.partials.form')

                    {!! Form::submit('Crear post', ['class' => 'btn btn-primary']) !!}

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
            width: 100%;
            height:100%;
        }
    </style>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
            //Habilita poder cargar imagenes en ckeditor5
            class MyUploadAdapter {
                constructor( loader ) {
                    // La instancia del cargador de archivos que se usará durante la carga. Suena aterrador pero no
                    // Preocúpese: el cargador pasará al adaptador más adelante en esta guía.
                    this.loader = loader;
                }

                    upload() {
                        return this.loader.file
                        .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
               }

                    // Anula el proceso de carga.
                    abort() {
                            if ( this.xhr ) {
                                this.xhr.abort();
                            }
               }
                     // Inicializa el objeto XMLHttpRequest usando la URL pasada al constructor.
                    _initRequest() {
                            const xhr = this.xhr = new XMLHttpRequest();

                            // Tenga en cuenta que su solicitud puede verse diferente. Depende de usted y su editor
                             // integración para elegir el canal de comunicación adecuado. Este ejemplo utiliza
                             // una solicitud POST con JSON como estructura de datos pero su configuración
                             // podría ser diferente.

                            xhr.open( 'POST', "{{route('imagescke.upload')}}", true );
                            xhr.setRequestHeader('X-CSRF-TOKEN', "{{csrf_token()}}");
                            xhr.responseType = 'json';
                    }

                    // Inicializa las oyentes XMLHttpRequest.
                    _initListeners( resolve, reject, file ) {
                                const xhr = this.xhr;
                                const loader = this.loader;
                                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                                xhr.addEventListener( 'abort', () => reject() );
                                xhr.addEventListener( 'load', () => {
                                    const response = xhr.response;

                                    // Este ejemplo asume que el objeto de "respuesta" del servidor XHR vendrá con
                                    // un "error" que tiene su propio "mensaje" que se puede pasar al rechazo()
                                    // en la promesa de carga.
                                    //
                                    // Su integración puede manejar los errores de carga de una manera diferente, así que asegúrese
                                    // se hace correctamente. La función de rechazo () debe llamarse cuando falla la carga.
                                    if ( !response || response.error ) {
                                        return reject( response && response.error ? response.error.message : genericErrorText );
                                    }

                                    // Si la carga es exitosa, resuelva la promesa de carga con un objeto que contenga
                                    // al menos la URL "predeterminada", apuntando a la imagen en el servidor.
                                    // Esta URL se usará para mostrar la imagen en el contenido. Obtenga más información en el
                                    // UploadAdapter#subir documentación.
                                    resolve( {
                                        default: response.url
                                    } );
                                } );

                                // Sube el progreso cuando sea compatible. El cargador de archivos tiene #uploadTotal y #uploaded
                                // propiedades que se utilizan, p. para mostrar la barra de progreso de carga en el editor
                                // interfaz de usuario.
                                if ( xhr.upload ) {
                                    xhr.upload.addEventListener( 'progress', evt => {
                                        if ( evt.lengthComputable ) {
                                            loader.uploadTotal = evt.total;
                                            loader.uploaded = evt.loaded;
                                        }
                                    } );
                                }
                            }

                   // Prepara los datos y envía la solicitud.
                    _sendRequest( file ) {
                            // Preparar los datos del formulario.
                            const data = new FormData();

                            data.append( 'upload', file );

                            // Nota importante: Este es el lugar indicado para implementar mecanismos de seguridad
                             // como autenticación y protección CSRF. Por ejemplo, puedes usar
                             // XMLHttpRequest.setRequestHeader() para establecer los encabezados de solicitud que contienen
                             // el token CSRF generado anteriormente por su aplicación.

                             // Enviar la solicitud.
                            this.xhr.send( data );
                    }
            }
            //Inicializa o ejecuta MyUploadAdapter
            function MyCustomUploadAdapterPlugin( editor ) {
                editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                    // ¡Configure la URL para el script de carga en su back-end aquí!
                    return new MyUploadAdapter( loader );
                };
            }
            //Convierte textarea en ckeditor
            ClassicEditor
                .create( document.querySelector( '#extract' ) )
                .catch( error => {
                    console.error( error );
                } );

            ClassicEditor
                .create( document.querySelector( '#body' ), {
                    extraPlugins: [ MyCustomUploadAdapterPlugin ],
                })
                .catch( error => {
                    console.error( error );
                } );

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
    
    
    <script>
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    </script>


@endsection