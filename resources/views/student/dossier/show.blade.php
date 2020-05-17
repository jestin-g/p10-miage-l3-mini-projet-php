@if (auth()->user()->hasStudent())
<div class="card mt-4">
  <div class="card-header">
    Mon dossier
  </div>
  <div class="card-body">
    @if (auth()->user()->student->hasDossier())

    @foreach ($dossierFilledFiles as $name => $url)
        <form action="{{ route('dossiers.deleteFile') }}" method="POST" role="form">
          @csrf
          <input type="hidden" id="file_type" name="file_type" value="{{ $name }}">
          <div class="form-group row">
            <div class="col-md-4">
              {{ $files_labels[$name] }}
            </div>
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-6">
                  <a href="{{ url($url) }}" class="btn btn-primary btn-block" role="button" target="_blank">Voir</a>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-danger btn-block">Suppr.</button>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            </div>
          </div>
        </form>
    @endforeach
    @foreach ($dossierNullFiles as $name => $path)
    <form action="{{ route('dossiers.uploadFile')}}" method="POST" role="form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="file_type" name="file_type" value="{{ $name }}">
      <div class="form-group row">
        <label for="file" class="col-md-4 col-form-label text-md-right">{{ $files_labels[$name] }}</label>
        <div class="col-md-5">
          <input id="file" type="file" class="form-control" name="file">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary">Téléverser</button>
        </div>
      </div>
    </form>
    @endforeach

    @else
    <td>
      <form action="{{ route('dossiers.init')}}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-success">Créer mon dossier étudiant</button>
      </form>
    </td>
    @endif
  </div>
</div>
@endif
