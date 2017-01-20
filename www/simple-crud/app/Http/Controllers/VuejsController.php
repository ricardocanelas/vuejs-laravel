<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class VuejsController extends Controller
{

    public function index()
    {
        return view("app");
    }
}
