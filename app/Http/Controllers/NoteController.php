<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    public function index(){
    //   $loggedInName=Auth::user()->name;
        $user=Auth::user();

        //$notlar=Note::where("user_id",$user->id)->first();   first yazarsan hata veriyor çünkü notlar 1 defa dönüyor
        $notlar=Note::where("user_id",$user->id)->get();
        return view("front.notes.index",compact("notlar"));
    }

    public function createPage(){
        return view("front.notes.create");
    }

    public function addNote(Request $request){
       //

        $request ->validate(
            [
                "title"=>"required | min:3 | max:20 ",
                "content"=>"required",
            ],[
                "title.required"=>"Lütfen başlığı 3 ile 20 tane harften oluşacak şekilde giriniz.",
                "content.required"=>"Lütfen içerik giriniz",
            ]
        );



        // dd("han");
        $note= new Note();
        $note->user_id=Auth::user()->id;
        $note->title=$request->title;
        $note->content=$request->content;
        $note->save();
        return redirect()->route("notes.index")->with("success","Başarıyla kaydedildi.");
    }


}
