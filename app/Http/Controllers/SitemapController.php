<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function index(){
        $urls = $this->getUrlsFromSitemap();
        return view('admin.sitemap.index',compact('urls'));
    }

    public function generate(){
        SitemapGenerator::create(env('APP_URL'))->writeToFile('sitemap.xml');
        return redirect()->back();
    }

    public function getUrlsFromSitemap(){
        $xmlString = file_get_contents(public_path('sitemap.xml'));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        return $phpArray;

    }

}
