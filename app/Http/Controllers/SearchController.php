<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('query');
        $categories = Category::where('is_published', 1)->get();

        $medicines = Medicine::with('category', 'company')
            ->where('is_published', 1)
            ->where('name', 'LIKE', "%$query%")
            ->orderByDesc('id')
            ->limit(50)
            ->get();

        return view('pages.search.index', compact('categories', 'medicines'));
    }
}
