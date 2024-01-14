<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::with(['evaluation', 'book'])->get();
        $moora = [
            'c1' => sqrt($alternatives->pluck('evaluation.book_type')->map(function ($item) {
                return $item ** 2;
            })->sum()),
            'c2' => sqrt($alternatives->pluck('evaluation.book_loan')->map(function ($item) {
                return $item ** 2;
            })->sum()),
            'c3' => sqrt($alternatives->pluck('evaluation.popularity')->map(function ($item) {
                return $item ** 2;
            })->sum()),
            'c4' => sqrt($alternatives->pluck('evaluation.availability')->map(function ($item) {
                return $item ** 2;
            })->sum()),
        ];

        $alternatives->map(function ($item) use ($moora) {
            $item->evaluation->book_type = $item->evaluation->book_type / $moora['c1'];
            $item->evaluation->book_loan = $item->evaluation->book_loan / $moora['c2'];
            $item->evaluation->popularity = $item->evaluation->popularity / $moora['c3'];
            $item->evaluation->availability = $item->evaluation->availability / $moora['c4'];
            $item->evaluation->total = ($item->evaluation->book_type * 0.52) + ($item->evaluation->book_loan * 0.27) + ($item->evaluation->popularity * 0.15) + ($item->evaluation->availability * 0.06);
            return $item;
        });

        $sortedAlternative = $alternatives->sortByDesc('evaluation.total');


        return view('admin.calculations.index', [
            'alternatives' => $alternatives,
            'sortedAlternatives' => $sortedAlternative,
        ]);

        // echo "<pre>";
        // print_r(json_encode($alternatives));
        // echo "</pre>";
    }
}
