@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Expenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-md-6">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>                  
                        <tr>
                          <th>Expense Categories</th>
                          <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($totals as $total)
                        <tr>
                          <td>{{ $total[0]->category_id }}</td>
                          <td>{{ $total->sum('amount') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
              {{ $chart->container() }}
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    {{ $chart->script() }}
    <!-- /.content -->
@endsection

@section('scripts')

@endsection