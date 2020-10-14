<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    public function index()
    {
        $categories = Unit::orderBy('created_at', 'desc')->paginate();
        return UnitResource::collection($categories);
    }
}
