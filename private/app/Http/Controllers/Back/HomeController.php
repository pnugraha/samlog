<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function __construct() {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	 
    public function index(Request $request) {  
        $pagetitle = 'Dashboard'; 
        return view('home.dashboard', compact('pagetitle'));
    }
	
   

}
