@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @can('manage-teachers')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    Candidature de: <b>{{ $candidacy->name }} {{ $candidacy->surname }}</b>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">Nom</th>
                        <td>{{ $candidacy->name ?? 'à renseigner'}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Prénom</th>
                        <td>{{ $candidacy->surname ?? 'à renseigner'}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Numéro carte étudiante</th>
                        <td>{{ $candidacy->num_student_card ?? 'à renseigner'}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Date de naissance</th>
                        <td>{{ \Carbon\Carbon::parse($candidacy->birth_date)->translatedFormat('j F, Y') ?? 'à renseigner'}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Adresse postale</th>
                        <td>{{ $candidacy->address ?? 'à renseigner'}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Numéro de téléphone</th>
                        <td>{{ $candidacy->phone_number ?? 'à renseigner'}}</td>
                      </tr>
                    </tbody>
                  </table>
                  @foreach ($dossier as $url)
                <a href="{{ url($url) }}" class="btn btn-primary btn-block" role="button" target="_blank">Voir fichier n°{{ $loop->iteration }}</a>
                  @endforeach
            </div>
        </div>
        @endcan
    </div>
</div>
@endsection
