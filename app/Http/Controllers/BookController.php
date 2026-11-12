<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequst;
use App\Http\Requests\BookUpdateRequst;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return BookResource::collection($books);
    }

    public function store(BookStoreRequst $request)
    {
        $book = Book::create($request->validated());
        return BookResource::make($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book->load("category"));
    }

    public function update(BookUpdateRequst $request, Book $book)
    {
        $book->update($request->validated());
        return BookResource::make($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            "message" => "deleted"
        ]);
    }
}
