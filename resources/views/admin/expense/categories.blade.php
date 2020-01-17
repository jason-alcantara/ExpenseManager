@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expense Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Expense Management</a></li>
              <li class="breadcrumb-item active">Expense Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>                  
                        <tr>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr data-toggle="modal" data-target="#updateCategory" data-cname="{{ $category->name }}" data-cdesc="{{ $category->description }}" data-cid="{{ $category->id }}">
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($category->created_at)->toDateString() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <div class=float-right>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add Category</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Add Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('addCategory') }}" method="POST" id="addCategoryForm">
                        
                        {{ csrf_field() }}
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="displayName">Display Name</label>
                            <input type="text" class="form-control" name="displayName">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>

                <!-- Update Modal -->
                <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Update Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('updateCategory') }}" method="POST" id="updateCategoryForm">
                        
                        {{ csrf_field() }}
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="displayName">Display Name</label>
                            <input type="text" class="form-control" name="displayName" id="displayName">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                          </div>
                          <input type="hidden" name="categoryId" id="cid" value="">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                      <form action="{{ route('deleteCategory') }}" method="POST">
                        @csrf
                        <input type="hidden" name="categoryId" id="id" value="">
                        <button type="submit" class="btn btn-danger" id="delete" style="position:absolute; bottom:1em; left:1em;">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
  $('#updateCategory').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var cname = button.data('cname')
    var cdesc = button.data('cdesc')
    var cid = button.data('cid')

    var modal = $(this)

    modal.find('.modal-body #displayName').val(cname)
    modal.find('.modal-body #description').val(cdesc)
    modal.find('.modal-body #cid').val(cid)
    modal.find('#id').val(cid)
    
  })
</script>
@endsection