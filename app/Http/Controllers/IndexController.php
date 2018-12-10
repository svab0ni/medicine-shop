<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicineResource;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_published', 1)->get();
        $medicines = Medicine::with('category', 'company')
            ->where('is_published', 1)
            ->orderByDesc('id')
            ->limit(50)
            ->get();

        return view('pages.index.index', compact('categories', 'medicines'));
    }
}
