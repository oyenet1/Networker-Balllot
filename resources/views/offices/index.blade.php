@extends('layouts.vali')
@section('content')
<div class="app-title">
    <div>
        <h1 class="text-primary"><i class="fa fa-diamond text-danger"></i> Positions</h1>
        <p>Add, edit, browse and delete positions here</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-diamond fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Positions</a></li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">
                <form action="{{ route('offices.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">Add Position</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text bg-white"> <i class="fas fa-chair text-primary"></i> </span></div>
                      <input class="form-control" id="exampleInputAmount" type="text" placeholder="Name of Position">
                      <div class="input-group-append bg-white"><button type="submit" class="input-group-text px-md-5 px-lg-7 px-3 bg-primary"> <i class="fa fa-paper-plane text-white" aria-hidden="true"></i> </button></div>  
                    </div>
                  </div>

                </form>
            </div>
          <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Position Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($offices as $office)
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @empty
                        <h5>No offices Yet, Kindly add position</h5>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection
