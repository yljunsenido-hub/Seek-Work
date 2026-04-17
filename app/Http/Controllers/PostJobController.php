<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostJobController extends Controller
{
    public function index(){
        return view("employer.postJob");
    }
}
