@if (auth()->user()->hasStudent() && auth()->user()->student->hasDossier())
<div class="card mt-4">
  <div class="card-header">
    Ma candidature
  </div>
  <div class="card-body">
      @if (auth()->user()->student->hasCandidacy())
          Etat de votre candidature: <b>{{ $candidacy_status }}</b>.
      @else
      <form action="{{ route('candidacy.store') }}" method="POST" role="form">
        @csrf
        <div class="form-group row">
            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Niveau') }}</label>
            <select id="grade" name="grade" class="custom-select col-md-6" style="text-transform: capitalize">
                @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->label }}</option>
                @endforeach
              </select>
        </div>
        <div class="form-group row">
            <div class="col text-center">
                <button type="submit" class="btn btn-success">
                    Envoyer ma candidature
                </button>   
            </div>
        </div>
      </form>
      @endif
  </div>
</div>
@endif
