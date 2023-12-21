<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $books = Book::query()->when($request->q, function (Builder $builder) use ($request) {
        //     $builder->where('title', 'like', '%' . $request->q . '%');
        // })->paginate(5);
        $books = Book::with('category')->when($request->category, function (Builder $builder) use ($request) {
            $builder->where('category_id', $request->category);
        })->when($request->q, function (Builder $builder) use ($request) {
            $builder->where('title', 'like', '%' . $request->q . '%');
        })->paginate(5);

        $categories = Category::all();

        return view('home', [
            'books' => $books,
            'categories' => $categories,
        ]);
    }
}
