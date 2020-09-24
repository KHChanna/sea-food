<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Cache\RedisStore;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('administrator.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
<<<<<<< HEAD
        $category = Category::all();
        return view('administrator.category.create', compact('category'));
=======
        return view('administrator.category.create');
>>>>>>> d023b6b2fe07bc2b2fc35d54d02ff93b9a087395
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
<<<<<<< HEAD
        $category = new Category([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            // 'parent_id' => $request->parent_id, 'parent_id' => 1,
            'description' => $request->get('description')
        ]);
        $categories->save();
        return redirect('admin/category/')->with('success', 'Category saved!');
=======
        Category::create($request->all());

        return redirect()->route('category.index');
>>>>>>> d023b6b2fe07bc2b2fc35d54d02ff93b9a087395
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('administrator.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Category::find($id)->update($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findCategoryCriteria() {
        $categories = Category::all();
        if($categories == null) {
            return $this->responseCodeAndMessage(404, 'No Category');
        }
        return $this->response(200, 'success', $categories);
    }

    public function categoryDetail($id) {
        $category = Category::find($id);
        if ($category == null) {
            return $this->responseCodeAndMessage(404, 'No Category');
        }
        return $this->response(200, 'success', $category);
    }

    public function categoryTotal() {
        $categories = Category::all();
        $countCategory = $categories->count();
        return $this->response(200, "success", $countCategory);
    }

    function response($code, $message, $data) {
        return [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
    }

    function resonseCodeAndMessage($code, $message) {
        return [
            'code' => $code,
            'message' => $message
        ];
    }
}
