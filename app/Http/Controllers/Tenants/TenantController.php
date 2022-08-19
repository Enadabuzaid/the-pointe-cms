<?php

namespace App\Http\Controllers\Tenants;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Tenant;
use App\Repository\TenantsCategoryRepositoryInterface;
use App\Repository\TenantsRepositoryInterface;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    protected $tenants;

    public function __construct(TenantsRepositoryInterface $tenants)
    {
        $this->tenants = $tenants;
        $this->middleware('auth');
    }

    public function index()
    {
        $tenants = $this->tenants->getAllTenants();

        return view('tenants.index',compact('tenants'));
    }


    public function create()
    {
        $tenants_cat = $this->tenants->getAllCategory();
        return view('tenants.create',compact('tenants_cat'));
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Tenant $tenant)
    {
        //
    }


    public function edit(Tenant $tenant)
    {
        //
    }

    public function update(Request $request, Tenant $tenant)
    {
        //
    }


    public function destroy(Request  $request)
    {
        return $this->tenants->deleteTenantById($request->tenant_id);
    }
}
