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
                    <form action="{{ route('offices.update', $office->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">Edit {{ $office->name }} Position</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text bg-white"> <i
                                            class="fas fa-chair text-primary"></i> </span></div>
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ $office->name ?? old('name') }}">
                                <div class="input-group-append bg-white"><button type="submit"
                                        class="input-group-text px-md-5 px-lg-7 px-3 bg-primary"> <i
                                            class="fa fa-paper-plane text-white" aria-hidden="true"></i> Update</button></div>
                            </div>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
                
    </div>
@endsection
