@extends('layout')

@section('titolo', $page->title)

@section('sottotitolo', $page->subtitle)


@section('content')
	
	<div class="container mt-5 mb-5">
	 <div class="row">
			<div class="col-lg-12 text-center">

   				<img src="{{ URL::to('/') }}/images/{{ $page->image }}" class="rounded mb-3" style="max-width: 100%;" alt="" />
   				
   		</div>
			<div class="col-lg-12 text-justify mt-3">

   				{!! $page->text !!}

   		</div>
   	</div>
  </div>

@endsection