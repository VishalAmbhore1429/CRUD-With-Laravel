<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function save(Request $request){
        // dd($request->all());
        $validateData  = $request->validate([
            'name' => 'required',
            'descreption' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::create([
            'name' => $validateData['name'],
            'descreption' => $validateData['descreption'],
            'price' => $validateData['price']
        ]);

        return response()->json(['message' => 'Product saved successfully'],200);
    }

    public function update(Request $request, $id){
        // Validate the incoming data
        $validateData  = $request->validate([
            'name' => 'required',
            'descreption' => 'required',
            'price' => 'required|numeric',
        ]);
    
        // Find the product by ID
        $product = Product::find($id);
    
        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Update the product details
        $product->name = $validateData['name'];
        $product->descreption = $validateData['descreption'];
        $product->price = $validateData['price'];
        
        // Save the updated product
        $product->save();
    
        // Return success response
        return response()->json(['message' => 'Product updated successfully'], 200);
    }

    public function delete($id){
        // Find the product by ID
        $product = Product::find($id);
    
        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Delete the product
        $product->delete();
    
        // Return success response
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function getAllProducts(){
        // Get all products from the database
        $products = Product::all();
    
        // Return the products in JSON format
        return response()->json($products, 200);
    }

    public function getProduct($id){
        // Find the product by ID
        $product = Product::find($id);
    
        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Return the product in JSON format
        return response()->json($product, 200);
    }
    
}
