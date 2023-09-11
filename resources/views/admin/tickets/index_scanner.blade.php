@extends('admin.layouts.admin')



@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
                <h5 class="content-header-title float-left pr-1 mb-0">Tickets</h5>
                <div class="breadcrumb-wrapper d-none d-sm-block">
                    <ol class="breadcrumb p-0 mb-0 pl-1">
                        <li class="breadcrumb-item"><a href="{{ route('adminDash') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Scanner</a>
                        </li>
                        <li class="breadcrumb-item active">Tickets
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="alert bg-rgba-secondary">

            <div class="row">
                <div class="col-lg-10">
                    <span class="align-middle">
                        Scanner un ticket
                    </span>
                </div>
                <div class="col-lg-2">
                    <a class="btn btn-primary" href="{{ route('ticket.admin.index') }}">
                        Retour
                    </a>
                </div>
            </div>

        </div>

        <!-- Background variants section start -->
        <section id="horizontal-vertical">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <h4 class="card-title">Scanner un ticket</h4>
                                </div>
                                <div class="col-lg-6 col-md-4 text-end">
                                    <a class="btn btn-primary" href="{{ route('ticket.admin.index') }}">
                                        Retour
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body card-dashboard">
                            @if (session()->has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session()->has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <video id="preview" height="300px"></video>
                            <form action="{{ route('ticket.admin.store_scanner') }}" method="post" id="form">
                                @csrf
                                <input type="hidden" name="ticket_identifiant" id="ticket_identifiant">
                            </form>

                            <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                            <script type="text/javascript">

                                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                                scanner.addListener('scan', function (content) {
                                console.log(content);
                                });
                                Instascan.Camera.getCameras().then(function (cameras) {
                                if (cameras.length > 0) {
                                    scanner.start(cameras[0]);
                                } else {
                                    console.error('No cameras found.');
                                }
                                }).catch(function (e) {
                                console.error(e);
                                });

                                scanner.addListener('scan', function(c){
                                    document.getElementById('ticket_identifiant').value = c;
                                    document.getElementById('form').submit();

                                })
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Background variants section end -->

    </div>
@endsection