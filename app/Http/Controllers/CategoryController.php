<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Create a new category
    public function store(Request $request){
        $category = Category::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en
        ]);

        if(!$category){
            return response()->json(['message' => 'Category not created'], 400);
        }
        return response()->json(['message' => 'Category Created Successfully'], 201);
    }

    // Get all categories
    public function index(){
        $categories = Category::all();

        if($categories->isEmpty()) {
            return response()->json(['message' => 'No Categories Found'], 404);
        }

        return response()->json($categories, 200);
    }

    // Get a single category by ID
        public function show(Request $request){
        $category = Category::find($request->id_Category);

        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category, 200);
    }

    // Update a category
    public function update(Request $request){
        $category = Category::find($request->id_Category);
        
        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en
        ]);

        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    // Delete a category
    public function destroy(Request $request){
        $category = Category::find($request->id_Category);

        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
