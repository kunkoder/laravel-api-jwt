<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        return $this->user->books()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'author', 'price', 'total_pages');
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required',
            'total_pages' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $book = $this->user->books()->create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'total_pages' => $request->total_pages
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->user->books()->find($id);
    
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, book not found.'
            ], 400);
        }
    
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->only('title', 'author', 'price', 'total_pages');
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required',
            'total_pages' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $book = $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'total_pages' => $request->total_pages
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully',
            'data' => $book
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ], Response::HTTP_OK);
    }
}
