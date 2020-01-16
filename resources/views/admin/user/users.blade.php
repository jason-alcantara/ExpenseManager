@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">User Management</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Juan Dela Cruz</td>
                            <td>juan@expensemanager.com</td>
                            <td>administrator</td>
                            <td>2019-03-21</td>
                        </tr>
                        <tr>
                            <td>Leo Ocampo</td>
                            <td>leo@expensemanager.com</td>
                            <td>user</td>
                            <td>2019-03-21</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <div class=float-right>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add User</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Add User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="addUserForm">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name">
                          </div>
                          <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email">
                          </div>
                          <div class="form-group">
                            <label for="roleSelect">Role</label>
                            <select class="form-control" id="roleSelect">
                              <option>Administrator</option>
                              <option>User</option>
                            </select>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
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

@endsection