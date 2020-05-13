@if (auth()->user()->hasStudent())
<div class="card mt-4">
  <div class="card-header">
    Mon dossier
  </div>
  <div class="card-body">
    @if (auth()->user()->student->hasDossier())
    <form action="{{ route('dossiers.uploadFile')}}" method="POST" role="form" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
        <label for="file" class="col-md-2 col-form-label text-md-right">CV</label>
        <div class="col-md-6">
          <input id="file" type="file" class="form-control" name="file">
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Téléverser</button>
        </div>
      </div>
    </form>
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
