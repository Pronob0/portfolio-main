@extends('admin.layouts.main')
@section('title')
<title>Admin Dashboard</title>
@endsection
@section('content')

<div class="header pronob-nav pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
              </ol>
            </nav>
          </div>

        </div>
        <!-- Card stats -->

      </div>
    </div>
  </div>
  <br>
  <!-- Page content -->
  <div class="container-fluid pronob-nav mt--6 px-5">

    <div class="header  py-7 py-lg-8 pt-lg-9">


      <!-- Page content -->
      <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12">
            <div class="card  border-0 mb-0">

              <div class="card-body px-lg-5 py-lg-5">
                  <div class="head d-flex flex-row">
                    <h3 class="text-dark text-left font-weight-bolder w-100">Category Edit</h3>
                    <a href="{{ route('admin.category') }}"  class="btn btn-default" >Back</a>
                  </div>
                <br><br>

                <form id="portfolio" action="{{ route('admin.category.update',$category->id) }}" method="POST" >
                    @csrf
          
                  <div class="row mt-4">
                      <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading">{{ __('Name') }} *</h4>
                        </div>
                      </div>
                      <div class="col-lg-9">
                          <input type="text" name="name"  class="form-control form-control-alternative text-dark" placeholder="@lang('Category Name')" value="{{ $category->name }}" required>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-lg-3">
                      <div class="left-area">
                          <h4 class="heading">{{ __('Status') }} *</h4>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" name="status" id="status" {{ $category->status==1 ? 'checked': '' }}>
                        <label class="form-check-label" for="status" >
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="status" id="status2" {{ $category->status==0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status2">
                          Deactive
                        </label>
                      </div>
                      <button  type="submit"  class="btn btn-default mt-5" >{{ __('Update') }}</a>
                  </div>
                </div>
          
          
                  
                </div>
              </form>
                
               

              </div>
            </div>

          </div>
        </div>
    <!-- Page content -->
 

  </div>

@endsection
@push('js')

@endpush

