<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class testController extends Controller
{
    public function showtest(){
        $page_title = 'My Bids';
        return view('dashboard',compact('page_title'));
    }
}
