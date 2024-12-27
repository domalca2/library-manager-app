<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index(){
        $libros = Books::with('author')->get();
        return response()->json($libros);
    }
    public function store(Request $request){
        try{
            $request->validate([
                'title' => 'required|string',
                'author_id' => 'required|integer',
                'published_year' => 'required|integer',
            ]);
            $book = new Books();
            $book->title = $request->input('title');
            $book->author_id = $request->input('author_id');
            $book->published_year = $request->input('published_year');
            $book->save();                             //indica a eloquent que lo guarde en bbdd
            
            return response()->json($book,201); // devuelve el propio libro creao en la peticion con el cdgo 201
        }catch(\Exception $e){
            return response()->json(['error'=>'Error', 500]);
        }
    }
    public function destroy($id){
        $book = Books::find($id); // busqueda gracias a eloquent

        if(!$book){
            return response()->json(['message' => 'El libro no se encuentra'], 404);
        }
        else{
            $book->delete();
        }
        return response()->json(['message' => 'Libro eliminado'], 200);

    }
}
