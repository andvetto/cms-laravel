@extends('layout-admin')

@section('titolo', 'Modifica')

@section('sottotitolo', "Modifica pagina")

@section('content')

<script type="text/javascript" src="{{ URL::asset('js/function.js') }}"></script>

        <form action="/{{ $page->id }}" method="POST" class="col-12 mb-4 mt-4" enctype="multipart/form-data">
            
            @method('PATCH')
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
                <input type="text" class="form-control {{ $errors->has('title') ? 'alert-danger' : '' }}" name="title" value="{{ $page->title }}" />
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control {{ $errors->has('slug') ? 'alert-danger' : '' }}" name="slug" value="{{ $page->slug }}" />
            </div>  

            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" class="form-control {{ $errors->has('subtitle') ? 'alert-danger' : '' }}" name="subtitle" value="{{ $page->subtitle }}" />
            </div>
            
            <div class="form-group">
                <label for="text">Text</label>
                <textarea type="text" id="editor2" class="form-control {{ $errors->has('text') ? 'alert-danger' : '' }}" name="text">{{ $page->text }}</textarea>
            </div>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor2');
                
            </script>

            <div class="row">
                <div class="col-12">
                    <div id="old-img-container">
                    <label>Current Image</label>
                        <div style="height:300px; border: solid 1px #000; text-align:center; line-height: 300px;">
                            <img class="p-3" style="max-width:100%; max-height:100%;" src="{{ URL::to('/') }}/images/{{ $page->image }}" alt="" />
                        </div>
                    </div>
                    <div id="preview-container" class="d-none">
                        <label>New Image</label>
                        <div style="height:300px;border: solid 1px #000; text-align:center; line-height: 300px;">
                            <img class="p-3" style="max-width:100%; max-height:100%;" id="preview" alt=""/>
                        </div>
                    </div>
                </div>


                <div class="col-8 mt-3 mb-3">

                    <label for="image" id="selectedImage" style="margin:0; width:100%;" class="btn  btn-outline-dark">Choose a file...            
                    </label>
                    <input type="file" accept="image/*" onchange="mostraFile(this.value), readURL(this)" name="image" id="image" class="d-none"></input>
                </div>
                <div class="col-4 text-right mt-3 mb-3">
                    <label for="deleteHidden" title="Delete" tabindex="0"><div class="btn  btn-outline-danger"><i class="fas fa-trash"></i></div></label>
                

                
                    <button type="submit" title="Save" class="btn btn-outline-success"><i class="fas fa-save"></i></button>
                </div>

            </div>
        </form>

        <form action="/{{ $page->id }}" id="deleteForm" method="POST" class="d-none">

            @method('DELETE')
            @csrf

            <button type="submit" id="deleteHidden" class="btn btn-lg btn-outline-danger"><i class="fas fa-trash"></i></button>
        </form>

@endsection