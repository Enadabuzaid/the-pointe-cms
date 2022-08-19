<button type="button" class="btn btn-primary waves-effect waves-light pull-right mb-3" data-bs-toggle="modal" data-bs-target="#AddCategoryTenant"
        data-bs-whatever="@getbootstrap">@lang('translation.Add Tenant Category')
</button>

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





