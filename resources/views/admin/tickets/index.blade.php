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
                        <li class="breadcrumb-item"><a href="#">Lists</a>
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
                <div class="col-lg-7">
                    <span class="align-middle">
                        Liste des Tickets
                    </span>
                </div>
                <div class="col-lg-5">
                    <div class="btn-group">
                        <a  class="btn btn-primary mr-1" href="{{ route('ticket.admin.index_scanner') }}">
                            Scanner un ticket
                        </a>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#large">
                            Créer un / des ticket(s)
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Background variants section start -->
        <section id="bg-variants">
            <div class="row">
                @foreach ($tickets as $ticket)
                    @if ($ticket->status == 'valide')
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card text-center">
                                <div class="badge badge-primary">Ticket valide</div>
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                {!! $ticket->code_qr !!}
                                <div class="mt-1">
                                    <div class="badge badge-warning">{{ $ticket->prix  }}</div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @elseif (($ticket->status == 'nonValide'))
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card text-center">
                                <div class="badge badge-danger">Ticket non valide</div>
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                {!! $ticket->code_qr !!}
                                <div class="mt-1">
                                    <div class="badge badge-warning">{{ $ticket->prix  }}</div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        <div class="mr-1 mb-1 d-inline-block">
            <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Formulaire pour créer un/des ticket(s)</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <form class="needs-validation" action="{{ route('ticket.admin.store') }}" method="post" novalidate>
                            @csrf
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationTooltip01">Combien de ticket voudriez-vous créer ?</label>
                                        <input type="text" class="form-control" name="nbr_of_ticket" id="validationTooltip01" placeholder="Entrer le nombre"  required />
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationTooltip02">Entrez le prix du ticket à créer </label>
                                        <input type="text" class="form-control" name="prix" id="validationTooltip02" placeholder="Entrer le prix" required />
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                </div>
                                {{-- <button class="btn btn-primary text-end" type="submit">Submit</button> --}}
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button> --}}
                                <button type="submit" class="btn btn-primary ml-1">
                                    <span class="d-none d-sm-block">Valider</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background variants section end -->

    </div>
@endsection