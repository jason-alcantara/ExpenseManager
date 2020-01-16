@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Expense Management</a></li>
              <li class="breadcrumb-item active">Expenses</li>
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
                            <th>Expense Category</th>
                            <th>Amount</th>
                            <th>Entry Date</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Travel</td>
                            <td>$230</td>
                            <td>2019-03-21</td>
                            <td>2019-03-21</td>
                        </tr>
                        <tr>
                            <td>Travel</td>
                            <td>$120</td>
                            <td>2019-03-21</td>
                            <td>2019-03-21</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <div class=float-right>
                    <button type="button" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection