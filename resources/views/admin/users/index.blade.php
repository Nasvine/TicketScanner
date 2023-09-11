@extends('admin.layouts.admin')



@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
                <h5 class="content-header-title float-left pr-1 mb-0">Utilisateurs</h5>
                <div class="breadcrumb-wrapper d-none d-sm-block">
                    <ol class="breadcrumb p-0 mb-0 pl-1">
                        <li class="breadcrumb-item"><a href="{{ route('adminDash') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Lists</a>
                        </li>
                        <li class="breadcrumb-item active">Utilisateurs
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic Textarea start -->
        <section id="horizontal-vertical">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <h4 class="card-title">Liste des utilisateurs</h4>
                                </div>
                                <div class="col-lg-6 col-md-4 text-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large">
                                        Ajouter un utilisateur
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table nowrap scroll-horizontal-vertical">
                                    <thead>
                                        <tr>
                                            <th class="text-center">First name</th>
                                            <th class="text-center">Last name</th>
                                            <th class="text-center">E-mail</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->first_name }}</td>
                                                <td class="text-center">{{ $user->last_name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">{{ $user->role->name }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a data-toggle="modal" data-target="#large_{{ $user->id }}" class="btn btn-primary mr-1">Modifier</a>
                                                        <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('user.admin.destroy', $user->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                              <button class="btn btn-danger">Supprimer</button>
                                                      </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="mr-1 mb-1 d-inline-block">
                                                <div class="modal fade text-left" id="large_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel17">Formulaire pour modifier un utilisateur</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="bx bx-x"></i>
                                                                </button>
                                                            </div>
                                                            <form class="needs-validation" action="{{ route('user.admin.update', $user->id ) }}" method="post" novalidate>
                                                                @method('PUT')

                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="validationTooltip01">Nom de Famille</label>
                                                                            <input type="text" class="form-control" name="first_name" id="validationTooltip01" value="{{ $user->first_name }}" required />
                                                                            <div class="valid-tooltip">Looks good!</div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="validationTooltip02">Prénom(s)</label>
                                                                            <input type="text" class="form-control" name="last_name" id="validationTooltip02" value="{{ $user->last_name }}" required />
                                                                            <div class="valid-tooltip">Looks good!</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="validationTooltip01">E-mail</label>
                                                                            <input type="email" class="form-control" name="email" id="validationTooltip01" value="{{ $user->email }}"  required />
                                                                            <div class="valid-tooltip">Looks good!</div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="validationTooltip02">Password</label>
                                                                            <input type="password" class="form-control" name="password" id="validationTooltip02" required />
                                                                            <div class="valid-tooltip">Looks good!</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="validationTooltip01">Rôle</label>
                                                                            <select class="form-control" name="role_id" id="basicSelect">
                                                                                @foreach ($roles as $k => $role)
                                                                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{ $k + 1 }} - {{ $role->name }}</option>
                                                                                @endforeach
                                                                            </select>
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mr-1 mb-1 d-inline-block">
                                <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel17">Formulaire pour ajouter un utilisateur</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="bx bx-x"></i>
                                                </button>
                                            </div>
                                            <form class="needs-validation" action="{{ route('user.admin.store') }}" method="post" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationTooltip01">Nom de Famille</label>
                                                            <input type="text" class="form-control" name="first_name" id="validationTooltip01" placeholder="Entrer le nom de famille" value="Mark" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationTooltip02">Prénom(s)</label>
                                                            <input type="text" class="form-control" name="last_name" id="validationTooltip02" placeholder="Entrer le(s) prénom(s)" value="Otto" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationTooltip01">E-mail</label>
                                                            <input type="email" class="form-control" name="email" id="validationTooltip01" placeholder="Entrer l'e-mail" value="Mark" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationTooltip02">Password</label>
                                                            <input type="password" class="form-control" name="password" id="validationTooltip02" placeholder="Entrer le(s) prénom(s)" value="Otto" required />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="validationTooltip01">Rôle</label>
                                                            <select class="form-control" name="role_id" id="basicSelect">
                                                                @foreach ($roles as $k => $role)
                                                                    <option value="{{ $role->id }}">{{ $k + 1 }} - {{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection