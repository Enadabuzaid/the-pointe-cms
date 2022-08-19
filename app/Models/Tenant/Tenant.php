<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(TenantsCategory::Class , 'tenant_category_id','tenant_category_id');
    }
}
