<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.category.create', compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($lang, Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
        ]);
        $category = Category::create($validated);
        return redirect()->route('categories.index', ['lang' => app()->getLocale()])->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Category $category)
    {
        return view('admin.category.edit', compact('category', 'lang'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Category $category)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index', ['lang' => $lang])
            ->with('success', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index', ['lang' => $lang])
            ->with('success', 'Category deleted successfully.');
    }
}
