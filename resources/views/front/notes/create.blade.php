@extends("front.layouts.master")


@section("content")


    @if($errors->any() )

           <div class="alert alert-danger">
               <ul>

        @foreach($errors->all() as $error )

            <li>{{$error}} </li>

        @endforeach
       </ul>
       </div>
    @endif

    <form action="{{route("notes.addNote")}}" method="post">
       @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Başlık</label>
            <input type="text" class="form-control" name="title" placeholder="Lütfen not başlığını giriniz." id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">İçerik</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>


        <button type="submit" class="btn btn-success">Gönder</button>
    </form>




@endsection
