<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowseJobController extends Controller
{
    public function index(){
        return view('applicant.browse-job');
    }
}
