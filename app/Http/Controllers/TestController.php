<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test(){
        $admin = Auth::guard('admin')->user();
        dd($admin->toArray());
    }
    public function index(){
        return view('Admin.Share.master');
    }
}
