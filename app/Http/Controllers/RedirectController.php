<?php

namespace App\Http\Controllers;

use App\Repository\RedirectRepositoryInterface;
use Illuminate\Http\Request;

class RedirectController extends Controller
{

    protected $redirects;

    public function __construct(RedirectRepositoryInterface $redirects)
    {
        $this->redirects = $redirects;
        $this->middleware('auth');
    }

    public function index(){
        $redirects = $this->redirects->getAllRedirects();
        return view('admin.redirect.index',compact('redirects'));
    }

    public function store(Request $request){
        return $this->redirects->storeRedirects($request);
    }

    public function destroy(Request $request){
        return $this->redirects->destroy($request);
    }

    public function switchStatus(Request $request){
        return $this->redirects->switch($request);
    }


}
