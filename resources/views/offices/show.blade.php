@extends('layouts.vali')
@section('title', $office->name ?? Auth::user()->name)

@section('content')
    <div class="app-title">
        <div>
            <h1 class="text-primary"><i class="fa fa-diamond text-danger"></i> Candidates</h1>
            <p>Add and browse Candidates here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href=" {{ route('offices.index') }} " class="btn-dark btn mr-2"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
                <button type="button" class="btn btn-primary">
                Candidate <span class="badge badge-light"> {{ $office->candidates()->count() }} </span>
              </button> </li>
            <li class="breadcrumb-item d-none"><a href="#">Candidates</a></li>
        </ul>

        {{-- success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                    <form method="POST" action="/office/{{ $office->id }}/candidate" class="mt-0" enctype="multipart/form-data">
                        @csrf
                          {{-- form for candidates --}}
                        @include('admin.candidates')
            
                        <div class="form-group mb-0 text-center">
                          <button type="submit" class="btn btn-outline-primary text-center">
                            Add Candidate
                          </button>
                        </div>
                      </form>
                </div>
                <div class="card-body table-responsive">
                    <button type="button" class="btn btn-primary mb-2">
                       Candidate(s) <span class="badge badge-light m-1"> {{ $office->candidates()->count() }} </span>
                      </button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="w-40">Candidate Name</th>
                                <th class="text-center">Total Vote</th>
                                <th class="action text-center">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            @forelse ($office->candidates as $candidate)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $candidate->name }} </td>
                                <td class="text-center"> {{ $candidate->votes }} </td>
                                <td class="d-flex justify-content-center">
                                  <a href=" {{ route('candidate.show', [ $office->id, $candidate->name] ) }} "
                                    class="btn btn-warning btn-sm mr-2" class="" data-toggle="tooltip" data-placement="left"
                                    title="view">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                  <a href=" {{ route('candidate.edit', [ $office->id, $candidate->name] ) }} "
                                    class="btn btn-primary btn-sm" class="" data-toggle="tooltip" data-placement="top"
                                    title="Edit Details">
                                    Edit
                                  </a>
                                  <form action=" {{ route('candidate.destroy', [ $office->id, $candidate->name] ) }} "
                                    method="post" class="ml-1" data-toggle="tooltip" data-placement="right" title="Delete">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                      <i class="fas fa-cut "></i>
                                    </button>
                                    @csrf
                                  </form>
                                </td>
                              </tr>
                            @empty
                                <h4 class="text-warning">No Candidate Yet, Kindly add Candidate</h4>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
