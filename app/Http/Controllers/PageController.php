<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function home() {
        return view('home');
    }

    public function division() {
        return view('division');
    }

    public function stages() {
        return view('stages');
    }

    public function registration() {
        return view('register');
    }

    public function adminpanel() {
        return view('adminpanel');
    }

}
