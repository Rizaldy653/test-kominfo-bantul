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
        $user = DB::table('customers')
            ->leftJoin('orders', 'customers.customer_id', '=', 'orders.customer_id')
            ->leftJoin('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->paginate(10);
        
        $data = [
            'company_name' => $user->company_name,
            'country' => $user->country,
            'total' => $user->sum('freight')
        ];

        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }
}
