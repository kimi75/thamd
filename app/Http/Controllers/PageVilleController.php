<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVille;
use App\Models\Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PageVilleController extends Controller{


  private function get_ville($ville_url){
    $ville = PageVille::where('url_page', $ville_url)->first();

    if($ville) {

      $les_villes = PageVille::select("*"
        ,DB::raw("6371 * acos(cos(radians(" . floatval($ville->ville_latitude_deg) . "))
        * cos(radians(page_villes.ville_latitude_deg))
        * cos(radians(page_villes.ville_longitude_deg) - radians(" . floatval($ville->ville_longitude_deg) . "))
        + sin(radians(" .floatval($ville->ville_latitude_deg). "))
        * sin(radians(page_villes.ville_latitude_deg))) AS distance"))
        ->where('page_villes.pays', $ville->pays)
        ->where('page_villes.id','!=', $ville->id)
        ->orderBy('distance', 'asc')
        ->take(24)
        ->get();

      return [ 
        'ville'      => $ville,
        'les_villes' => $les_villes
      ];
    }
    else {
      return abort(404);
    }
  }

  public function index($ville_url, Request $request){

      return view('page.villes.architecte', $this->get_ville($ville_url));
    
  }

  public function dplg($ville_url,Request $request){
    return view('page.villes.architecte-dplg', $this->get_ville($ville_url));
  }

  public function hmonp($ville_url,Request $request){
    return view('page.villes.architecte-hmonp', $this->get_ville($ville_url));
  }
  
  public function interieur($ville_url,Request $request){
    return view('page.villes.architecte-interieur', $this->get_ville($ville_url));
  }
}
