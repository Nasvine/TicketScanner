@extends('admin.layouts.admin')



@section('content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <!-- Greetings Content Starts -->
            <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Nombre total de Ticket de 1000f restants</h3>
                    </div>
                    <div class="card-body pt-0">
                        <h1 class="text-primary text-center font-large-2 text-bold-500">{{ $ticket_1000_restants }}</h1>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="dashboard-content-center">
                                {{-- <p>You have done 57.6% more sales today.</p>
                                <button type="button" class="btn btn-primary glow">View Sales</button> --}}
                            </div>
                            <div class="dashboard-content-right">
                                {{-- <img src="../../../app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Nombre total de Ticket de 500f restants</h3>
                    </div>
                    <div class="card-body pt-0">
                        <h1 class="text-primary text-center font-large-2 text-bold-500">{{ $ticket_500_restants }}</h1>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="dashboard-content-center">
                                {{-- <p>You have done 57.6% more sales today.</p>
                                <button type="button" class="btn btn-primary glow">View Sales</button> --}}
                            </div>
                            <div class="dashboard-content-right">
                                {{-- <img src="../../../app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Nombre total de Ticket de 1000f vendus</h3>
                    </div>
                    <div class="card-body pt-0">
                        <h1 class="text-primary text-center font-large-2 text-bold-500">{{ $ticket_1000_vendus }}</h1>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="dashboard-content-center">
                                {{-- <p>You have done 57.6% more sales today.</p>
                                <button type="button" class="btn btn-primary glow">View Sales</button> --}}
                            </div>
                            <div class="dashboard-content-right">
                                {{-- <img src="../../../app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                <div class="card">
                    <div class="card-header">
                        <h3 class="greeting-text">Nombre total de Ticket de 500f vendus</h3>
                    </div>
                    <div class="card-body pt-0">
                        <h1 class="text-primary text-center font-large-2 text-bold-500">{{ $ticket_500_vendus }}</h1>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="dashboard-content-center">
                                {{-- <p>You have done 57.6% more sales today.</p>
                                <button type="button" class="btn btn-primary glow">View Sales</button> --}}
                            </div>
                            <div class="dashboard-content-right">
                                {{-- <img src="../../../app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection