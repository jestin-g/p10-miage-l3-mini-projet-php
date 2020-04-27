@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Modifier votre profil</div>
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        <b>Attention :</b> tous les champs sont obligatoires !
                    </div>
                <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $student->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-3 col-form-label text-md-right">Prénom</label>
                            <div class="col-md-6">
                                <input id="surname" type="surname" class="form-control" name="surname" value="{{ $student->surname }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_student_card" class="col-md-3 col-form-label text-md-right">N° de carte étudiante</label>
                            <div class="col-md-6">
                                <input id="num_student_card" type="num_student_card" class="form-control" name="num_student_card" value="{{ $student->num_student_card }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_date" class="col-md-3 col-form-label text-md-right">Date de naissance</label>
                            <div class="col-md-6">
                                <input id="birth_date" type="birth_date" class="form-control" name="birth_date" value="{{ $student->birth_date }}" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" required autofocus>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Format: YYYY-MM-DD
                                  </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label text-md-right">Adresse postale</label>
                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control" name="address" value="{{ $student->address }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-3 col-form-label text-md-right">N° de téléphone</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="phone_number" class="form-control" name="phone_number" value="{{ $student->phone_number }}" required autofocus>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection