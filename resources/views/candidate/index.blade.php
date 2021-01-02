@extends('layouts.vali')
@section('title', "candidate" ?? Auth::user()->name)

@section('content')
    <div class="app-title">
        <div>
            <h1 class="text-primary"><i class="fas fa-user-cog text-danger"></i> Candidates</h1>
            <p>Browse Candidates here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href=" {{ route('offices.show', $office->id) }} " class="btn-dark btn mr-2"> <i class="fa fa-arrow-left"
                        aria-hidden="true"></i> Back </a>
            </li>
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
            <div class="col-12">
                <div class="card bg-light">
                    <div class="card-header">
                        <h4>Candidates Details</h4>
                    </div>
                    <div class="card-body d-flex flex-wrap text-capitalize">
                        <div class="div bg-milk1 py-2">
                            <div class="w-50 d-block mx-auto">
                                <img src="{{ asset('uploads/candidate/' . $candidate->image) }}"
                                    alt="{{ $candidate->name }}" class="img-fluid rounded-circle border">
                            </div>
                        </div>
                        <div class="div p-2">
                            <p class="display-5"><span class="font-weight-bold">Name:</span> {{ $candidate->name }} </p>
                            <p class="display-5"><span class="font-weight-bold">Details:</span> {{ $candidate->details }} </p>
                            <p class="display-5"><span class="font-weight-bold">Total Vote:</span>  <span class="badge badge-primary">{{ $candidate->votes }} </span> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
