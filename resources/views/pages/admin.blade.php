

@extends('layout-admin')

@section('titolo', 'Pagine')

@section('sottotitolo', "Aggiungi o modifica pagine")


@section('content')

<script>
    function scorri(){
       $('.first-5').toggleClass('d-none');
       $('.second-5').toggleClass('d-none');
    }

</script>
<style>
    #labelScorri{
        margin:0;
    }
</style>

    <div class="container row mb-5 mt-5">




        @php ($i = 0)
        @foreach ($pages as $page)
            @php ($i++)

            @if ($i<=5)

            
                <div class="col-7 list-group first-5">
                    <a class="list-group-item list-group-item-action" href="/{{ $page->slug }}">{{ $page->title }}<a>
                </div>
                <div class="col-5 mt-2 first-5">
                    <form action="/{{ $page->id }}" method="POST">
                        
                        @method('DELETE')
                        @csrf

                        <a href="{{ $page->id }}/edit"><button type="button" title="Edit" class="btn btn-outline-primary"><i class="fas fa-pen"></i></button></a>

                        <button type="submit" title="Delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>

                    </form>               
                </div>
           

           @endif


            @if ($i>5)
      
                <div class="col-7 list-group second-5 d-none">
                    <a class="list-group-item list-group-item-action" href="/{{ $page->slug }}">{{ $page->title }}<a>
                </div>
                <div class="col-5 mt-2 second-5 d-none">
                    <form action="/{{ $page->id }}" method="POST">
                        
                        @method('DELETE')
                        @csrf

                        <a href="{{ $page->id }}/edit"><button type="button" title="Edit" class="btn btn-outline-primary"><i class="fas fa-pen"></i></button></a>

                        <button type="submit" title="Delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>

                    </form>               
                </div>
            
 
            @endif

            
        @endforeach
         
        <div class="col-5 mt-2 offset-7">
        
                <a href="/new"><button type="button" title="New page" class="btn btn-outline-success"><i class="fa fa-plus"></i></button></a>
                @if ($i>5)
                    
                    <label class="btn btn-outline-info second-5 mt-2 d-none" for="scorri"><i class="fa fa-arrow-left"></i></label>

                    <label class="btn btn-outline-info first-5 mt-2" for="scorri"><i class="fa fa-arrow-right"></i></label>

                @endif

        </div>

        <div class="col-6 d-none">
            <button type="button" id="scorri" onclick="scorri()" class="btn btn-outline-info">Avanti</button> 
        </div> 
    </div>    


    
@endsection