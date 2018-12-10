<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $categories = Category::where('is_published', 1)->get();

        $medicines = Medicine::with('category', 'company')
            ->where('is_published', 1)
            ->where('category_id', $category->id)
            ->orderByDesc('id')
            ->limit(50)
            ->get();

        return  view('pages.category.index', compact('categories', 'medicines'));
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
