<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Book;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::with('book')->get();

        return view('admin.evaluations.index', [
            'alternatives' => $alternatives
        ]);
    }

    public function create()
    {
        $books = Book::all();

        return view('admin.evaluations.create', [
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        $book_list = $request->book;

        foreach ($book_list as $book) {
            $alternative = Alternative::create([
                'book_id' => $book
            ]);

            $alternativeId = $alternative->alternative_id;

            Evaluation::create([
                'alternative_id' => $alternativeId,
                'book_type' => 0,
                'book_loan' => 0,
                'popularity' => 0,
                'availability' => 0,
            ]);
        }

        return redirect('evaluations')->with('toast_success', 'Evaluation has been created successfully!');
    }

    public function edit($alternative)
    {
        $alternative = Alternative::with(['evaluation', 'book'])->findOrFail($alternative);

        return view('admin.evaluations.edit', [
            'alternative' => $alternative
        ]);
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        $evaluation = Evaluation::findOrFail($evaluation->evaluation_id);

        $evaluation->update([
            'book_type' => $request->book_type,
            'book_loan' => $request->book_loan,
            'popularity' => $request->popularity,
            'availability' => $request->availability,
        ]);

        return redirect('evaluations')->with('toast_success', 'Evaluation has been updated successfully!');
    }
}
