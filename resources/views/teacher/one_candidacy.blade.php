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
                <a href="{{ url($url) }}" class="btn btn-secondary btn-block" role="button" target="_blank">Voir fichier n°{{ $loop->iteration }}</a>
                  @endforeach
            </div>
            <div class="card-footer">
                <form action="{{route('candidacy.update',[$candidacy->candidacy_id])}}" method="POST">
                    @method('GET')
                    @csrf
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Statut') }}</label>
                        <select id="status" name="status" class="custom-select col-md-6">
                            @foreach ($statuses as $status)
                                <option <?php if ($status->id == $candidacy->status_id) {echo ('selected="selected"');} ?> value="{{ $status->id }}">{{ $status->label }}</option>
                            @endforeach
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn">Changer statut</button>               
                </form>
            </div>
        </div>
        @endcan
    </div>
</div>
@endsection
