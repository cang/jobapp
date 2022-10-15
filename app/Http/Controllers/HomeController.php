<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function home() {
        //return view('home');
        return view('jobs');
    }

    public function contact() {
        return view('contact');
    }
    
    public function joblist() {
        $jobs = Job::orderBy('id','desc')->paginate(5);
        //var_dump($jobs);
        return view('joblist', compact('jobs'));
    }
    
    public function admin() {
        return redirect()->route('company.index');
    }
    
    
}
