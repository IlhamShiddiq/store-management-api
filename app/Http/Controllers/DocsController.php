<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index() {
        return view('index');
    }

    public function login_logout() {
        return view('login');
    }

    public function store() {
        return view('store');
    }

    public function admin() {
        return view('admin');
    }

    public function category() {
        return view('category');
    }

    public function product() {
        return view('product');
    }
}
