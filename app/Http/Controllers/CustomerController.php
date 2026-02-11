<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function getTopSpender()
    {
        $topSpenders = Customer::getTopSpender();
        return response()->json($topSpenders);
    }
}
