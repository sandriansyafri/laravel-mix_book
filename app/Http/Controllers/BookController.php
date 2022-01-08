<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return response()->json([
            'data' => $books,
            'status' => true
        ]);
    }

    public function edit(Book $book)
    {
        return response()->json([
            'data' => $book,
            'status' => true,
        ]);
    }

    public function store(Request $request)
    {
        Book::create($request->all());
    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());
    }

    public function upload($id, Request $request)
    {
        $bookImageName = time() . '.' . $request->image->extension();
        $book = Book::find($id);
        $path = public_path('images');

        if (!empty($book->image) && file_exists($path . '/' . $book->image)) :
            unlink($path . '/' . $book->image);
        endif;

        $book->image = $bookImageName;
        $book->save();
        $request->image->move($path, $bookImageName);

        return response()->json([
            'data' => $book,
            'status' => true
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        $path = public_path('images');
        if (!empty($book->image) && file_exists($path . '/' . $book->image)) {
            unlink($path . '/' . $book->image);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}
