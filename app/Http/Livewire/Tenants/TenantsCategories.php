<?php

namespace App\Http\Livewire\Tenants;

use App\Models\Tenant\TenantsCategory;
use App\Repository\TenantsCategoryRepositoryInterface;
use Livewire\WithPagination;
use Livewire\Component;

class TenantsCategories extends Component
{
    protected $tenants_category;

    public $category_id = 0;
    public $delete_id = '';

    public $per_page = 3;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount(TenantsCategoryRepositoryInterface $tenants_category)
    {
        $this->tenants_category = $tenants_category;
    }

    public function render()
    {

//        $category = $this->tenants_category->getAllTenantsCategory();

        return view('livewire.tenants.tenants-categories',[
            'sub_category'=>TenantsCategory::all()->where('parent_id','=',0),
            'category'=>TenantsCategory::where('parent_id','=',$this->category_id)->paginate($this->per_page)
        ]);
    }

    public function deleteId($id){
        $this->delete_id = $id;
    }

    public function delete(){
        TenantsCategory::find($this->delete_id)->delete();
    }



}
