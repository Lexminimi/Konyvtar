<?php

namespace App\Http\Controllers;

use App\Book; // Használom a book modellt
use Illuminate\Http\Request;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    /** Bár a Book modellben nincs all() statik metódus, de 'extends Eloquent'
    * miatt van*/
      $books = Book::all();
      /**
      * a compact()- laravelben arra jó hogy asszociatív tömböt csinál , így a blade
      * -ben tudunk az adatbázisból kapott adatokra hivatkozni
      * jó leírás. https://tinyurl.com/y98f5sr5
      **/
      return view('books.index',compact('books'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('books.create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      request()->validate([
          'name' => 'required',
          'detail' => 'required',
      ]);


      Book::create($request->all());


      return redirect()->route('books.index')
                      ->with('success','Book created successfully.');
  }


  /**
   * Display the specified resource.
   *
   * @param  \App\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function show(Book $book)
  {
      return view('books.show',compact('book'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function edit(Book $book)
  {
      return view('books.edit',compact('book'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Book $book)
  {
       request()->validate([
          'name' => 'required',
          'detail' => 'required',
      ]);


      $book->update($request->all());


      return redirect()->route('books.index')
                      ->with('success','Book updated successfully');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function destroy(Book $book)
  {
      $book->delete();


      return redirect()->route('books.index')
                      ->with('success','Book deleted successfully');
  }
}
