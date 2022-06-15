<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class ApiPostsController extends Controller
{
    public function index(Request $request)
    {   
        $data = Posts::all();

        return response()->json($data);
    }
}
