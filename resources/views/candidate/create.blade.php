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
            <div class="col-12">
               <div class="card text-white bg-light">
                 <div class="card-header">

                 </div>
                 <div class="card-body">
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
               </div>
            </div>
        </div>
    </div>
@endsection
