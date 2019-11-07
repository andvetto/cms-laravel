@extends('layout-admin')

@section('titolo', 'Sfondo')

@section('sottotitolo', "Scegli l'immagine di sfondo della Homepage")

@section('content')
	

<script type="text/javascript" src="{{ URL::asset('js/function.js') }}"></script>

	<form action="/sfondo" method="post" class="col-12 mb-4 mt-4" enctype="multipart/form-data">

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
                <input type="text" class="form-control {{ $errors->has('title') ? 'alert-danger' : '' }}" name="title" @if (isset($sfondo->title)) value="{{ $sfondo->title }}" @endif />
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" class="form-control {{ $errors->has('subtitle') ? 'alert-danger' : '' }}" name="subtitle" @if (isset($sfondo->subtitle)) value="{{ $sfondo->subtitle }}" @endif />
            </div>


        @if (isset($sfondo->file))
        	<div id="old-img-container">
				<label>Current Background</label>
				<div class="text-center mb-3" style="border: solid 1px #000;">
					<img class="p-3" src="{{ URL::to('/') }}/images/{{ $sfondo->file }}" width="640px" height="360px" alt="" />
				</div>
			</div>
		@endif	
		
			<div id="preview-container" class="d-none">
				<label>New Background</label>
				<div class="text-center mb-3" style="border: solid 1px #000;">
                	<img class="p-3" id="preview" width="640px" height="360px" alt=""/>
            	</div>
            </div>
		
		<div class="row">
			<div class= "col-10">
				<label for="file" id="selectedImage" style="margin:0; width:100%;" class="btn btn-outline-dark">Choose a file...
			</div>	
			<div class= "col-2">
			</label>
		    	<input type="file" accept="image/*" onchange="mostraFile(this.value), readURL(this)" name="file" id="file" class="d-none"></input>
		    	<button class="btn btn-outline-success float-right" title="Save" type="submit" name="submit"><i class="fas fa-save"></i></button>
		    </div>
		</div>
	</form>

@endsection