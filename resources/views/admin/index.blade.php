@extends('layouts.vali')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}

                    <a href="" data-toggle="tooltip" data-placement="left" title="Hooray!"> {{ Auth::user()->name }} You are login as admin</a>
                    <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                    <i class="fab fa-facebook-square   fa-2x text-primary "></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
