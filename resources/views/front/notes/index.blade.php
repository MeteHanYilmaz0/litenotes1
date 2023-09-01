@extends("front.layouts.master")


@section("content")



   <a class="btn btn-success" href="{{route("notes.createPage")}}">Not oluştur</a>
<br>

        @if(session("success"))
        <div class="alert alert-success">
            {{session("success")}}
        </div>
    @endif


   @if($notlar->count()>0 )
       @foreach($notlar as  $not)


           <div class="card">
               <div class="card-header">
                   {{$not->title}}
               </div>
               <div class="card-body">
                   {{$not->content}}
               </div>
           </div>
       @endforeach
   @else
       <div class="container"   >
           <h3 class="text-warning">Henüz bir not kaydetmediniz!</h3>
       </div>



   @endif


@endsection
