<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::get();
        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'parent_id' => 'numeric',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => '0',
                'messages' => $validator->messages()->get('*')
            ];
            return response()->json($data);
        }

        Category::create( [
            'name' => $request->name,
            'parent_id' => $request->parent,
            'description' => $request->description,
        ] );

        return response()->json(['messages' => 'Category Created Successfully']);
    }

    public function update(Request $request, $id)
    {

    }

    public function count()
    {
        $categories = Category::get();
        return JsonResponse( count($categories) );
    }

}
