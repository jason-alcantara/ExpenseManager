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
                      @foreach($expenses as $expense)
                        <tr>
                            <td>{{ $expense->category->name }}</td>
                            <td>${{ $expense->amount }}</td>
                            <td>{{ $expense->entry_date }}</td>
                            <td>{{ \Carbon\Carbon::parse($expense->created_at)->toDateString() }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <div class=float-right>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExpense">Add Expense</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Add User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('addExpense') }}" method="POST" id="addExpenseForm">
                        
                      {{ csrf_field() }}
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="category">Expense Category</label>
                          <select class="form-control" name="category">
                          @foreach($categories as $category)
                            <option>{{ $category->name }}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="amount">Amount</label>
                          <input type="text" class="form-control" name="amount">
                        </div>
                        <div class="form-group">
                          <label for="entry">Entry Date</label>
                          <input type="date" class="form-control" name="entry">
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

            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection