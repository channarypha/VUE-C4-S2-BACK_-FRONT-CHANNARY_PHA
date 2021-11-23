<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBook()
    {
        return Book::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBook(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();

        return response()->json(['message' => 'book created successfully!!'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBook($id)
    {
        return Book::findOrFail(id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail(id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();

        return response()->json(['message' => 'book updated successfully!!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBook($id)
    {
        return Book::destroy(id);
    }
}
