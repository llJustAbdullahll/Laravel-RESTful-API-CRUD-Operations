<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    // Create a new category
    public function store(StoreCategoryRequest $request){
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if(!$category){
            return response()->json(['message' => 'Category not created'], 400);
        }
        return response()->json(['message' => 'Category created successfully', 'data' => $category], 201);
    }

    // Get all categories
    public function index(){
        $categories = Category::all();

        if($categories->isEmpty()) {
            return response()->json(['message' => 'No Categories Found'], 404);
        }

        return response()->json(['data' => $categories], 200);    
    }

    // Get a single category by ID
        public function show($id){
        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['data' => $category], 200);    
    }

    // Update a category
    public function update(UpdateCategoryRequest $request, $id){
        $category = Category::find($id);
        
        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Category updated successfully','data' => $category], 200);    
    }

    // Delete a category
    public function destroy($id){
        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);    
    }
}
