<?php

namespace App\Http\Controllers\Tenants;

use App\Http\Controllers\Controller;
use App\Http\Requests\SortTenantsCategory;
use App\Models\Admin\Tenants\TenantsCategory;
use Illuminate\Http\Request;
use App\Repository\TenantsCategoryRepositoryInterface;

class TenantsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $tenants_category;

    public function __construct(TenantsCategoryRepositoryInterface $tenants_category)
    {
        $this->tenants_category = $tenants_category;
        $this->middleware('auth');
    }
    public function index()
    {
        $category = $this->tenants_category->getAllTenantsCategory();
        return view('tenantsCategory.index',compact('category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SortTenantsCategory $request)
    {
       return $this->tenants_category->storeTenantsCategory($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Tenants\TenantsCategory  $tenantsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TenantsCategory $tenantsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Tenants\TenantsCategory  $tenantsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TenantsCategory $tenantsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Tenants\TenantsCategory  $tenantsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenantsCategory $tenantsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Tenants\TenantsCategory  $tenantsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenantsCategory $tenantsCategory)
    {
        //
    }

}
