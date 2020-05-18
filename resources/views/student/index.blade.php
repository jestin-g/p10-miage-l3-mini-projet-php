@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @can('manage-students')
            @include('student.show')
            @include('student.dossier.show')
            @include('student.candidacy.show')
        @endcan
    </div>
</div>
@endsection
