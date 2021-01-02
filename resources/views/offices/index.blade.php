@extends('layouts.vali')
@section('title', Auth::user()->name)
@section('content')
    <div class="app-title">
        <div>
            <h1 class="text-primary"><i class="fa fa-diamond text-danger"></i> Positions</h1>
            <p>Add, edit, browse and delete positions here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <button type="button" class="btn btn-primary">
                Position(s) <span class="badge badge-light"> {{ $offices->count() }} </span>
              </button> </li>
            <li class="breadcrumb-item d-none"><a href="#">Positions</a></li>
        </ul>

        {{-- success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ session('success') }}
            </div>
        @endif
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
                                <div class="input-group-prepend"><span class="input-group-text bg-white"> <i
                                            class="fas fa-chair text-primary"></i> </span></div>
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Name of Position">
                                <div class="input-group-append bg-white"><button type="submit"
                                        class="input-group-text px-md-5 px-lg-7 px-3 bg-primary"> <i
                                            class="fa fa-paper-plane text-white" aria-hidden="true"></i> </button></div>
                            </div>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="card-body table-responsive">
                    <button type="button" class="btn btn-primary mb-2">
                        Position(s) <span class="badge badge-light m-1"> {{ $offices->count() }} </span>
                      </button>
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
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-capitalize"> {{ $office->name }} </td>
                                    <td class="d-flex">
                                        <a href="{{ route('offices.show', $office->id) }}" class="btn btn-warning btn-sm mr-2"
                                            class=" mr-2" data-toggle="tooltip" data-placement="left"
                                            title="View all  {{ $office->name }}  Candidate">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </a>
                                        <a href=" {{ route('offices.edit', $office->id) }} " class="btn btn-primary btn-sm"
                                            class=" mr-2"> <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                        <a href="/offices/{{ $office->id }}/candidate/create "
                                            class="btn btn-success btn-sm ml-2 mr-2" data-toggle="tooltip" data-placement="top"
                                            title="Add New Candidate to {{  $office->name}}">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                                        </a>
                                        <form action=" {{ route('offices.destroy', $office->id) }} " method="post"
                                            class="float-left">
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-eraser" aria-hidden="true"></i> Delete</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h4 class="text-warning">No position Yet, Kindly add position</h4>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
