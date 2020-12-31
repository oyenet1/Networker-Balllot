@extends('layouts.app')
@section('tilte', 'Networker Ballot')
@section('content')
    <div class="container-fluid bg-white">
        <div class="container">
            <div class="row justify-content-center p-5">
                <img src="/image/vote-logo.png" alt="" class="w-25 d-block rounded-circle">
                <h3 class="neue w-100 text-center m-2">Online Voting System</h3>
                <p class="big text-center text-primary">Safe. &nbsp; Reliable. &nbsp; Fast. &nbsp; Secure</p>
                <div class="w-100  text-center">
                    <a href="" class="text-center btn btn-success btn-sm" style="clear: both">
                        <i class="fas fa-tag mr-1"></i> Cast Your Vote</a>
                </div>
            </div>
        </div>
    </div>

    {{-- slides of candidates --}}
    <div class="container-fluid bg-milk4">
        <div class="container p-5">
            <div class="row justify-content-center bg-milk4 p-3">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 round">
                                        <div class="rounded bg-white p-4">
                                            <div class=""><img src="/image/vote-logo.png" alt="imagename"
                                                    class="mx-auto candidates d-block"></div>
                                            <div class="w-100 d-block text-center">
                                                <h2>Person one</h2>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure architecto
                                                    a quos, velit eveniet, ipsum fuga non totam dignissimos veniam nihil
                                                    deserunt ea quam sint quas omnis, impedit adipisci beatae.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 round">
                                        <div class="rounded bg-white p-4">
                                            <div class=""><img src="/image/vote-logo.png" alt="imagename"
                                                    class="mx-auto candidates d-block"></div>
                                            <div class="w-100 d-block text-center">
                                                <h2>Person one</h2>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure architecto
                                                    a quos, velit eveniet, ipsum fuga non totam dignissimos veniam nihil
                                                    deserunt ea quam sint quas omnis, impedit adipisci beatae.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 round">
                                        <div class="rounded bg-white p-4">
                                            <div class=""><img src="/image/vote-logo.png" alt="imagename"
                                                    class="mx-auto candidates d-block"></div>
                                            <div class="w-100 d-block text-center">
                                                <h2>Person one</h2>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure architecto
                                                    a quos, velit eveniet, ipsum fuga non totam dignissimos veniam nihil
                                                    deserunt ea quam sint quas omnis, impedit adipisci beatae.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
