<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Response;
use Illuminate\Support\Facades\Input;


class CommentController extends Controller
{
    // mengambil semua data yang ada di database
    public function index() {
        $comments = Comment::all(); 
        return Response::json($comments, 200);
    }

    // simpan data ke database dengan metode POST
    public function store() {
        
        $comments = New Comment;
        
        $comments->author = Input::get('author');
        $comments->text = Input::get('text');

        if($comments->save()) {
           return Response::json("success", 201); 
        } else 
            return Response::json("error saving", 500); 
    }

    // mengambil data dengan id tertentu
    public function show($id) {
        $comments = Comment::find($id);
        if (is_null($comments)) {
            return Response::json("not found", 404);
        } 

        return Response::json($comments, 200);
    }

    // update data
    // 1. membuat objek dari kelas Comment & temukan id yang ingin diubah 
    // 2. cek apakah input POST data dari user kosong, jika tidak, maka replace data dari objek 1
    public function update($id) {
        
        $comments = Comment::find($id);
        $inputAuthor = Input::get('author');
        $inputText = Input::get('text');

        if((!is_null($inputAuthor)) && (!is_null($inputText))) {
            // update data 
            $comments->author = $inputAuthor;
            $comments->text = $inputText;

            $success = $comments->save();

            if ($success) 
                return Response::json("Update data berhasil", 201);
            else 
                return Response::json("Update data gagal", 500);
        } else 
            return Response::json("Data baru author dan text tidak boleh kosong", 500);


    }

    // menghapus data dari database
    public function destroy($id) {
        $comments = Comment::find($id);
        if(is_null($comments)) {
            return Response::json("not found", 404);
        }
        
        $success = $comments->delete();

        if(!$success) 
            return Response::json("error deleting", 500);

        return Response::json("sukses hapus data", 200);
    }


}
