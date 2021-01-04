@extends('layouts.vali')
@section('title', $office->name ?? Auth::user()->name)

@section('content')
    <div class="app-title">
        <div>
            <h1 class="text-primary"><i class="fas fa-user-cog text-danger"></i> Dear, {{ Auth::user()->name }}</h1>
            <p>Cast your vote here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home" class="btn-dark btn mr-2"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
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
                <form action="{{ route('voter.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="user[has_voted]" value="1">

                    {{-- president candidates here --}}
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="text-capitalize">President</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($presidents as $president)
                                    <label for="{{ $president->id }}">
                                        <li class="list-group-item my-1">
                                            <input type="radio" name="" id="candidate{{ $president->id }}" class="mr-1"
                                                value="{{ $president->id }}">
                                            {{ $president->name }}
                                        </li>
                                    </label>
                                @empty
                                    <p>No candidate yet</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    {{-- secretary candidates here --}}
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="text-capitalize">Secretary</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($secretaries as $secretary)
                                    <label for="{{ $secretary->id }}">
                                        <input type="radio" name="" id="{{ $secretary->id }}" class="mr-1"
                                            value="{{ $secretary->id }}">
                                        {{ $secretary->name }}
                                    </label>
                                @empty
                                    <p>No candidate yet</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    {{-- governor candidates here --}}
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="text-capitalize">Governor</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($governors as $governor)
                                    <label for="{{ $governor->id }}">
                                        <li class="list-group-item my-1">
                                            <input type="radio" name="" id="candidate{{ $governor->id }}" class="mr-1"
                                                value="{{ $governor->id }}">
                                            {{ $governor->name }}
                                        </li>
                                    </label>
                                @empty
                                    <p>No candidate yet</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-center form-control">Vote</button>
                </form>
            </div>
        </div>
    </div>
@endsection
