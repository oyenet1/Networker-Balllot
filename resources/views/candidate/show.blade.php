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
                <a href=" {{ route('offices.show', $office->id) }} " class="btn-dark btn mr-2"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
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
        </div>
    </div>
@endsection
