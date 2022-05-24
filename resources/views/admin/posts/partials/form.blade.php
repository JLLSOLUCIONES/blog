<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}
    
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
    
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach ($tags as $tag)

        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
        
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label  class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    
    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
     @enderror

</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
           {{--  con isset si hay imagen definida la muestra y si no muestra la de pordefecto, asi no hay que definir la variable $post en el metodo edit --}}
        @isset ($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
        @else
        <img id="picture" src="https://cdn.pixabay.com/photo/2020/11/22/20/45/colorful-5767937_960_720.jpg" alt="">
        @endisset

        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        
        <p>
            <p>En cumplimiento de lo dispuesto en el artículo 5 de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, y de la Ley 34/2002, de 11 de Julio, de Servicios de la Sociedad de la Información y de Correo Electrónico (LSSI-CE), LAGUI PUERTAS DE COCINAS.L., garantiza la confidencialidad de los datos personales de sus clientes. Le comunicamos que su dirección de correo electrónico forma parte de una base de datos gestionada bajo la responsabilidad de LAGUI PUERTAS DE COCINA S.L., con la única finalidad de prestarle los servicios por usted solicitados, por su condición de cliente, proveedor, o porque nos haya solicitado información en algún momento. Es voluntad de LAGUI PUERTAS DE COCINA, S.L., evitar el envío deliberado </p>
        </p>
    </div>

</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>