<?php

namespace App\Http\Controllers\Site\Product;

use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request)->get();

        // return $products;

        return view('site.product.products', [
            'products' => $products,
            'categories' => $products,
        ]);
    }

    public function productByCategory(Request $request, $category)
    {
        $products = Product::whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })->get();

        return view('site.product.products-by-category', [
            'products' => $products,
            'category' => Category::where('slug', $category)->first(),
        ]);
    }

    public function show(string $id)
    {
        $product = Product::whereId($id)->with('gallery', 'category', 'attributes', 'files')->first();
        // return $product;
        return view('site.product.show', [
            'product' => $product,
        ]);
    }

    public function productByCategory1(Request $request, $category)
    {
        // $ids = Category::whereSlug($category)->pluck('id');
        // return  $products = Product::whereIn('category_id', $ids)->get();
        // $category;

        $products = Product::whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })->get();

        return view('site.product.Products-by-category', [
            'products' => $products,
            'categories' => $products,
        ]);

        // $products = Product::with('category') // Eager load the category relationship
        //     ->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     })->get();

        return $products;
    }
}
