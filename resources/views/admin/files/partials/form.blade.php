<div class="form-group">
    {!! Form::label('link', 'Link') !!}
    {!! Form::text('link', null, ['class' =>'form-control', 'placeholder'=>'Ingrese el link de instagram']) !!}

    @error('link')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
           
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper"> 
            @isset ($file['url'])
                <img id="picture" src="{{Storage::url($file->url)}}">
            @else
                <img id="picture" src="https://www.instagram.com/rsrc.php/v3/yz/r/i8Mc7za91gZ.png" alt="">
            @endisset
        </div>
    </div>

    <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'Imagen que se mostrara en el link de instagram') !!}
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
    
                @error('file')
                    <span class="text-danger">{{$message}}</span>
                @enderror
    
            </div>
        
            <p>
                <p>La imagen que selecciones se subira al servidor y se visulizara en el grid instagram en la pagina principal The Disaster Box.</p>
            </p>
    </div>

</div>