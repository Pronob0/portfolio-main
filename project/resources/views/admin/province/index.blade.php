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
                    <h3 class="text-dark text-left font-weight-bolder w-75">Category</h3>
                    <button href="" type="button" class="btn btn-default" data-toggle="modal" data-target="#categoryModal">Add New Category</button>
                  </div>
                <br><br>

               
                    <div class="table-responsive">
                      <table class="table align-items-center table-light font-weight-bold" id="datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" >Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                          
                      
                      </table>
                    </div>

                  
                    
                        
            
                
                
              </div>
            </div>

          </div>
        </div>

        {{-- Add new Category Modal --}}
        <!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <hr class="modal-hr">
        <form id="portfolio" action="{{ route('admin.category.store') }}" method="POST" >
          @csrf

        <div class="row mt-4">
            <div class="col-lg-3">
              <div class="left-area">
                  <h4 class="heading">{{ __('Name') }} *</h4>
              </div>
            </div>
            <div class="col-lg-9">
                <input type="text" name="name"  class="form-control form-control-alternative text-dark" placeholder="@lang('Category Name')" value="" required>
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
              <input class="form-check-input" value="1" type="radio" name="status" id="status">
              <label class="form-check-label" for="status" >
                Active
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" value="0" type="radio" name="status" id="status2" checked>
              <label class="form-check-label" for="status2">
                Deactive
              </label>
            </div>
        </div>
      </div>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


{{-- Delete Modal start --}}

<div class="modal fade confirm-modal"  class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Delete Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
        <hr class="modal-hr">
        <h4 class="text-center justify-center">Everything will be delete under this category. Do You want to Delete this data?</h4>
      
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger btn-ok">Delete</button>
      </div>


        
      </div>
    
   
    </div>
  </div>
</div>
{{-- Delete Modal End --}}

      </div>


    <!-- Page content -->
 

  </div>

@endsection
@push('js')

<script type="text/javascript">

    $(document).ready(function() {
        $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.province.datatables') }}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' },
        ]
        });
    });


</script>

@endpush

