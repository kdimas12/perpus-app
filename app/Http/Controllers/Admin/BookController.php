<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookStoreRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
        $title = 'Delete Book!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.books.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('admin.books.create', [
            'publishers' => $publishers,
            'categories' => $categories
        ]);
    }

    public function store(BookStoreRequest $request)
    {
        Book::create([
            'book_category_id' => $request->category_id,
            'title' => $request->title,
            'code' => $request->code,
            'author' => $request->author,
            'genre' => $request->genre,
            'year' => $request->year,
            'edition' => $request->edition,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'status' => $request->status,
            'city' => $request->publish_city,
            'book_publisher_id' => $request->publisher_id,
        ]);

        return redirect('books')->with('toast_success', 'Book has been created!');
    }

    public function edit($book)
    {
        $book = Book::findOrFail($book);
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('admin.books.edit', [
            'book' => $book,
            'publishers' => $publishers,
            'categories' => $categories
        ]);
    }

    public function update(BookStoreRequest $request, $book)
    {
        $book = Book::findOrFail($book);

        $book->update([
            'book_category_id' => $request->category_id,
            'title' => $request->title,
            'code' => $request->code,
            'author' => $request->author,
            'genre' => $request->genre,
            'year' => $request->year,
            'edition' => $request->edition,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'status' => $request->status,
            'city' => $request->publish_city,
            'book_publisher_id' => $request->publisher_id,
        ]);

        return redirect('books')->with('toast_success', 'Book has been updated!');
    }

    public function destroy(Book $book)
    {
        $book = Book::findOrFail($book->book_id);
        $book->delete();

        return redirect('books')->with('toast_success', 'Book has been deleted!');
    }
}
