@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Roles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">User Management</a></li>
              <li class="breadcrumb-item active">Roles</li>
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
                    @foreach($roles as $role)
                        <tr data-toggle="modal" data-target="#updateRole" data-rname="{{ $role->name }}" data-rdesc="{{ $role->description }}" data-rid="{{ $role->id }}">
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($role->created_at)->toDateString() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <div class=float-right>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRole">Add Role</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Add Role</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('addRole') }}" method="POST" id="addRoleForm">
                        
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
                <div class="modal fade" id="updateRole" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Update Role</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('updateRole') }}" method="POST" id="updateRoleForm">
                        
                        {{ csrf_field() }}
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="displayName">Display Name</label>
                            <input type="text" class="form-control" name="updateName" id="displayName">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="updateDesc" id="description">
                          </div>
                            <input type="hidden" name="roleId" id="rid" value="">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="float-right btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="float-right btn btn-primary" id="update">Update</button>
                        </div>
                      </form>
                      <form action="{{ route('deleteRole') }}" method="POST">
                        @csrf
                        <input type="hidden" name="roleId" id="id" value="">
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
  $('#updateRole').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var rname = button.data('rname')
    var rdesc = button.data('rdesc')
    var rid = button.data('rid')

    var modal = $(this)

    if(rname === "Administrator")
    {
      modal.find('#delete').attr('disabled', true)
      modal.find('.modal-footer #update').attr('disabled', true)
      modal.find('.modal-body #displayName').attr('readonly', true)
      modal.find('.modal-body #displayName').val(rname)
      modal.find('.modal-body #description').attr('readonly', true)
      modal.find('.modal-body #description').val(rdesc)
    }
    else
    {
      modal.find('#delete').attr('disabled', false)
      modal.find('.modal-footer #update').attr('disabled', false)
      modal.find('.modal-body #displayName').attr('readonly', false)
      modal.find('.modal-body #displayName').val(rname)
      modal.find('.modal-body #description').attr('readonly', false)
      modal.find('.modal-body #description').val(rdesc)
      modal.find('.modal-body #rid').val(rid)
      modal.find('#id').val(rid)
    }
    
  })
</script>
@endsection