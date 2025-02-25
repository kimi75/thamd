<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVille;
use App\Models\Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ArchitecteController extends Controller
{
  public function index(Request $request){

   return view('page.architecte');
  }

  public function dplg(Request $request){
    return view('page.architecte-dplg');
  }

  public function hmonp(Request $request){
    return view('page.architecte-hmonp');
  }
  
  public function interieur(Request $request){
    return view('page.architecte-interieur');
  }
}
