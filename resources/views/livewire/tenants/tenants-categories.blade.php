<div>

    <div class="row mb-4">

        <div class="col-8">
            <button type="button" class="btn btn-primary waves-effect waves-light pull-right" data-bs-toggle="modal" data-bs-target="#AddCategoryTenant"
                    data-bs-whatever="@getbootstrap">@lang('translation.Add Tenant Category')
            </button>
        </div>

        <div class="col-3">
            <label class="form-label">@lang('translation.tenantsSubCategory')</label>
            <select class="form-select" wire:model="category_id" name="category_id">
                <option>Select</option>
                @foreach($sub_category as $sub)
                    <option value="{{$sub->id}}">{{$sub->tenants_category_name_en}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-1">
            <label class="form-label">Pages</label>
            <select class="form-select" wire:model="per_page" name="category_id">
                <option>Select</option>
                <option value="3">3</option>
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="24">24</option>
            </select>
        </div>
    </div>

    <div class="modal fade" id="AddCategoryTenant" tabindex="-1" aria-labelledby="AddCategoryTenantLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="card-title mb-0 flex-grow-1">@lang('translation.Add Tenant Category')</h4>
                    <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">@lang('translation.english')</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">@lang('translation.arabic')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('tenants-category.store') }}" method="POST" id="AddCategoryTenants">
                    @csrf
                    <div class="modal-body">
                        <p><i data-feather="alert-triangle" class="text-warning display-5"></i> @lang('translation.AddParentCategoryNote')</p>
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="home2" role="tabpanel">
                                <p class="mb-0">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">@lang('translation.categoryname')</label>
                                    <input type="text" class="form-control" id="recipient-name" name="category_name_en">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">@lang('translation.categorydescription')</label>
                                    <textarea class="form-control" id="message-text" name="category_desc_en"></textarea>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane" id="profile2" role="tabpanel">
                                <p class="mb-0">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">@lang('translation.categorynamear')</label>
                                    <input type="text" class="form-control" id="recipient-name" name="category_name_ar">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">@lang('translation.categorydescriptionar')</label>
                                    <textarea class="form-control" id="message-text" name="category_desc_ar"></textarea>
                                </div>
                                </p>
                            </div>

                            <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizemd" name="check">
                                <label class="form-check-label" for="customSwitchsizemd">this is sub category</label>
                            </div>


                            <div id="category_select" class="mb-3" style="display: none">
                                <label class="form-label">@lang('translation.tenantsSubCategory')</label>
                                <select class="form-select" name="parent_id">
                                    <option>Select</option>
                                    @foreach($category as $sub)
                                        <option value="{{$sub->id}}">{{$sub->tenants_category_name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translation.close')</button>
                    <button type="submit" class="btn btn-primary" form="AddCategoryTenants">@lang('translation.Add')</button>
                </div>
            </div>
        </div>
    </div>


    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach


    @if($category->isEmpty())
        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
            <i class="mdi mdi-block-helper label-icon"></i><strong>Be Note</strong> - this Category Don't have any Sub category
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        <div class="row">
            @foreach($category as $tenants)
                @if(app()->getLocale() == 'en')
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom text-uppercase">
                                <div class="row">
                                    <div class="col">{{$tenants->tenants_category_name_en}}</div>
                                    <div class="col">
                                        <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                           data-bs-whatever="@getbootstrap"  wire:click="deleteId({{ $tenants->id }})">
                                            <i class=" far fa-trash-alt fa-lg" style="float: right"></i>
                                        </a>
                                        <a href="#" class="text-primary"> <i class="far fa-edit fa-lg" style="float: right;padding-right: 6px"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{$tenants->tenants_category_desc_en}}
                                </p>
                                <a href="javascript: void(0);"
                                   class="btn btn-primary waves-effect waves-light">@lang('translation.Go To') {{$tenants->tenants_category_name_en}}</a>
                            </div>
                            <div class="card-footer bg-transparent border-top text-muted">
                                @if($tenants->tenants_category_status)
                                    <a href="#" class="badge badge-success bg-success">@lang('translation.Active')</a>
                                    <a href="#" class="badge badge-danger bg-danger">@lang('translation.Deactivate')</a>
                                @else
                                    <a href="#" class="badge badge-danger bg-danger">@lang('translation.Deactivate')</a>
                                    <a href="#" class="badge badge-danger bg-danger">@lang('translation.Deactivate')</a>
                                @endif
                            </div>
                        </div>

                        {{--DELETE MODAL START --}}
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="card-title mb-0 flex-grow-1">@lang('translation.Delete Tenant Category')</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <p>@lang('translation.warningDelete')</p>
                                            </div>
                                            <div class="col-2">
                                                <button   type="button"  class="btn btn-outline-danger" wire:click="delete()">@lang('translation.Delete')</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--DELETE MODAL END --}}
                    </div>
                @else
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom text-uppercase">
                                {{$tenants->tenants_category_name_ar}}
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{$tenants->tenants_category_desc_ar}}
                                </p>
                                <a href="javascript: void(0);"
                                   class="btn btn-primary waves-effect waves-light">@lang('translation.Go To') {{$tenants->tenants_category_name_ar}}</a>
                            </div>
                            <div class="card-footer bg-transparent border-top text-muted">
                                @if($tenants->tenants_category_status)
                                    <a href="#" class="badge badge-success bg-success">@lang('translation.Active')</a>
                                @else
                                    <a href="#" class="badge badge-danger bg-danger">@lang('translation.Deactivate')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        </div>
        {{ $category->links() }}
    @endif



</div>
