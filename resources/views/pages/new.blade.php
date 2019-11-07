@extends('layout-admin')

@section('titolo', 'Nuova Pagina')

@section('sottotitolo', "Crea pagina")


@section('content')

<script type="text/javascript" src="{{ URL::asset('js/function.js') }}"></script>

        <form action="/admin" method="POST" class="col-12 mb-4 mt-4" enctype="multipart/form-data">
            
            @csrf

            @if ($errors->any())

                <div class="form-group notification">
                    
                        @foreach ($errors->all() as $error)

                        <div class="alert alert-warning" role="alert">
                                {{ $error }}
                        </div>
                    
                        @endforeach
                        
                </div>

             @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'alert-danger' : '' }}" name="title" value="{{ old('title') }}" />
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control {{ $errors->has('slug') ? 'alert-danger' : '' }}" name="slug" value="{{ old('slug') }}" />
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" class="form-control {{ $errors->has('subtitle') ? 'alert-danger' : '' }}" name="subtitle" value="{{ old('subtitle') }}" />
            </div>
            
            <div class="form-group">
                <label for="text">Text</label>
                <textarea type="text" id="editor1" class="form-control {{ $errors->has('text') ? 'alert-danger' : '' }}" name="text">{{ old('text') }}</textarea>
            </div>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                CKEDITOR.config.allowedContent = true;
            </script>
                       
            <div class="row">
                <div class="col-12">
                    <label>Image</label>
                        <div id="preview-container" class="d-none" style="height:300px; border: solid 1px #000;  text-align:center; line-height: 300px;">
                            <img class="p-3" style="max-width:100%;  max-height:100%; " id="preview" alt=""/>
                        </div>
                </div>
                <div class="col-10">
                    <label for="image" id="selectedImage" style="margin:0; width:100%;" class="btn btn-outline-dark mb-3 mt-3">Choose a file...            
                    </label>
                    <input type="file" accept="image/*" onchange="mostraFile(this.value), readURL(this)" name="image" id="image" class="d-none"></input>
                </div>
                <div class="col-2 mb-3 mt-3">
                    <button type="submit" title="Save" class="btn btn-outline-success float-right"><i class="fas fa-save"></i></button>
                </div>

            </div>

        </form>

@endsection