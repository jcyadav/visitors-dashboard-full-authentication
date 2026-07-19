<?php

namespace App\Http\Controllers;

use App\Models\AssdtSidebar;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = AssdtSidebar::where('parent_id',0)
                    ->where('is_active',1)
                    ->with('children')
                    ->orderBy('tab_order')
                    ->get();

        return view('dashboard',compact('menus'));
    }
}