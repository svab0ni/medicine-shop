<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Category;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class MedicineController extends Controller
{
    public function index()
    {

    }

    public function store()
    {

    }

    public function show(string $categorySlug, string $medicineSlug, int $medicineId)
    {
        $category = Category::where('slug', $categorySlug)->first();

        $medicine = Medicine::with('category', 'company')
            ->where('is_published', 1)
            ->where('id', $medicineId)
            ->first();

        $relatedMedicine = Medicine::with('category', 'company')
            ->where('is_published', 1)
            ->where('category_id', $medicine->category_id)
            ->limit(3)
            ->get();

        $topSelling = Medicine::with('category', 'company')
            ->where('is_published', 1)
            ->limit(4)
            ->get();

        return  view('pages.medicine.index', compact('categories', 'medicine', 'relatedMedicine', 'topSelling'));
    }

    public function update(int $id, UpdateMedicineRequest $request)
    {
        $medicine = Medicine::find($id);

        $data = $request->validated();

        if($medicine->is_published === 0) {
            if($data['is_published'] === 1)
                $data['published_at'] = Carbon::now();
        }

        $data['slug'] = str_slug($data['name'], '-');

        $medicine->fill($data)->save();

        return redirect('/profile/medicine');
    }

    public function destroy()
    {

    }

    public function create()
    {
        if(! $user = Auth::user())
            return view('auth.login');

        return view('pages.medicine.create');
    }

    public function edit($id)
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $medicine = Medicine::find($id);

        return view('pages.medicine.edit', compact('medicine'));
    }
}
