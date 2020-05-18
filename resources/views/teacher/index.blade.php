@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @can('manage-teachers')
        @include('teacher.all_candidacies')
        @endcan
    </div>
</div>
@endsection
