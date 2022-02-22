<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('home');
    }
    public function about_us() {
        return view('about_us');
    }
    public function contact_page() {
        return view('contact_page');
    }
    public function upload_page(){
        return view('upload_page');
    }    
    public function upload_list(){
        return view('upload_list');
    }
    public function results_page(){
        return view('results_page');
    }

}