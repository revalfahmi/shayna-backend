<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\helpers\ResponseFormatter;

class ProductApiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::with('galleries')->find($id);
            if ($product) 
                return ResponseFormatter::success($product, 'Data berhasil di load');
            else
                return ResponseFormatter::error($product, 'Data product kosong', 404);
        }

        if ($slug) {
            $slugs = Product::with('galleries')->where('slug', $slug);
            if ($slugs) 
                return ResponseFormatter::success($slugs, 'Data berhasil di load');
            else
                return ResponseFormatter::error($slugs, 'Data product kosong', 404);
        }

        $product = Product::with('galleries');

        if ($name) 
            $product->where('name', 'like', '%' . $name . '%');

        if ($type) 
            $product->where('type', 'like', '%' . $type . '%');

        if ($price_from) 
            $product->where('price', '>=', $price_from);
        
        if ($price_to) 
            $product->where('price', '>=', $price_to);
            
        return ResponseFormatter::success($product->paginate($limit), 'Data List Product berhasil di load');
    }
}
