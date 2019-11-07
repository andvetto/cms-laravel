@extends('layout-admin')

@section('titolo', 'Logo')

@section('sottotitolo', "Scegli un Logo")

@section('content')
	

<script type="text/javascript" src="{{ URL::asset('js/function.js') }}"></script>

	<form action="/logo" method="post" class="col-12 mb-4 mt-4" enctype="multipart/form-data">

		@if ($errors->any())

	        <div class="form-group notification">
	            
	                @foreach ($errors->all() as $error)

	                <div class="alert alert-warning" role="alert">
	                        {{ $error }}
	                </div>
	            
	                @endforeach
	                
	        </div>

        @endif


        @if (isset($logo->file))
        	<div id="old-img-container">
				<label>Current Logo</label>
				<div class="text-center mb-3" style="border: solid 1px #000;">
					<img class="p-3" src="{{ URL::to('/') }}/images/{{ $logo->file }}" width="100px" height="100px" alt="" />
				</div>
			</div>
			
			<div id="preview-container" class="d-none">
				<label>New Logo</label>
				<div class="text-center mb-3" style="border: solid 1px #000;">
                	<img class="p-3" id="preview" width="100px" height="100px" alt=""/>
            	</div>
            </div>
		@endif


		@csrf
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