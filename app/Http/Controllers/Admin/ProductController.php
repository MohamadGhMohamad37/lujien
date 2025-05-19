<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index($lang)
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.product.index', compact('products', 'lang'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create($lang)
    {
        $categories = Category::all();
        return view('admin.product.create', compact('lang', 'categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store($lang, Request $request)
{
    $validated = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'desc_en' => 'nullable|string',
        'desc_ar' => 'nullable|string',
        'price' => 'nullable|numeric',
        'discount_price' => 'nullable|numeric|lt:price',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'color' => 'nullable|array',
        'color.*' => 'nullable|string|max:50',
        'color_code' => 'nullable|array',
        'color_code.*' => 'nullable|string|max:50',
        'size' => 'nullable|array',
        'size.*' => 'nullable|string|max:50',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Handle main image
    if ($request->hasFile('image')) {
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $name = time() . '.' . $ext;
        $path = public_path('storage/product');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $img->move($path, $name);
        $validated['image'] = "product/" . $name;
    }

    // Handle multiple gallery images
    if ($request->hasFile('images')) {
        $images = [];
        $path = public_path('storage/product/images');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        foreach ($request->file('images') as $img) {
            $ext = $img->getClientOriginalExtension();
            $name = time() . rand(1000, 9999) . '.' . $ext;
            $img->move($path, $name);
            $images[] = "product/images/" . $name;
        }

        $validated['images'] = $images;
    } else {
        $validated['images'] = null;
    }
$validated['colors'] = $request->has('colors') ? $request->input('colors') : [];
$validated['color_codes'] = $request->has('color_codes') ? $request->input('color_codes') : [];
$validated['size'] = $request->has('size') ? $request->input('size') : [];
    Product::create($validated);

    return redirect()->route('products.index', $lang)->with('success', 'Product created successfully.');
}



    /**
     * Show the form for editing the specified product.
     */
    public function edit($lang, Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'lang', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update($lang, Request $request, Product $product)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'color' => 'nullable|string',
            'color_code' => 'nullable|string',
            'size' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        // Replace main image if uploaded
        if ($request->hasFile('image')) {
            // Delete old main image
            if ($product->image && file_exists(public_path('storage/' . $product->image))) {
                unlink(public_path('storage/' . $product->image));
            }

            // Store new main image
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('storage/product');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img->move($path, $name);
            $validated['image'] = "product/" . $name;
        }

        // Replace gallery images if uploaded
        if ($request->hasFile('images')) {
            // Delete old gallery images
            if ($product->images) {
                $oldImages = json_decode($product->images, true);
                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        $oldImagePath = public_path('storage/' . $oldImage);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                }
            }

            // Store new gallery images
            $newImages = [];
            $galleryPath = public_path('storage/product/images');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }

            foreach ($request->file('images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $name = time() . rand(1000, 9999) . '.' . $ext;
                $img->move($galleryPath, $name);
                $newImages[] = "product/images/" . $name;
            }

            $validated['images'] = json_encode($newImages);
        }

        // Update product data
        $product->update($validated);

        return redirect()->route('products.index', $lang)->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified product from storage.
     */
    public function destroy($lang, Product $product)
    {
        // Delete main image if it exists
        if ($product->image && file_exists(public_path('storage/' . $product->image))) {
            unlink(public_path('storage/' . $product->image));
        }

        // Delete gallery images if they exist
        if ($product->images) {
            $galleryImages = json_decode($product->images, true);

            if (is_array($galleryImages)) {
                foreach ($galleryImages as $img) {
                    $imgPath = public_path('storage/' . $img);
                    if (file_exists($imgPath)) {
                        unlink($imgPath);
                    }
                }
            }
        }

        // Delete the product from the database
        $product->delete();

        return redirect()->route('products.index', $lang)->with('success', 'Product deleted successfully.');
    }
}
