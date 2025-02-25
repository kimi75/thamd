<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVille;

class SitemapController extends Controller{

  private function get_all_cities(){
      $villes = PageVille::orderByDesc('id')->get();
     //dd($villes);
      return $villes;
  }

  public function index() {
    try {
      $urls = PageVille::whereNotNull("active_seo")
      ->orderBy('id', 'DESC')
      ->get();

    } catch (\Exception $e) {
      $urls = collect();
    }

   return response()->view('sitemap.index', ['urls' => $urls])->header('Content-Type', 'text/xml');
 }

  public function plan_site_architecte_villes() {
    return response()->view('page.plan-site.architecte-villes', ['villes' => $this->get_all_cities()]);
  }
  public function plan_site_architecte_dplg_villes() {
    return response()->view('page.plan-site.architecte-dplg-villes', ['villes' => $this->get_all_cities()]);
  }
  public function plan_site_architecte_hmonp_villes() {
    return response()->view('page.plan-site.architecte-hmonp-villes', ['villes' => $this->get_all_cities()]);
  }
  public function plan_site_architecte_interieur_villes() {
    return response()->view('page.plan-site.architecte-interieur-villes', ['villes' => $this->get_all_cities()]);
  }



}
