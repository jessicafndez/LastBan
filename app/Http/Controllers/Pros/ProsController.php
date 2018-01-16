<?php

namespace App\Http\Controllers\Pros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProsController extends Controller {
    
    public function index() {
        return view('pros.pros');
    }
}