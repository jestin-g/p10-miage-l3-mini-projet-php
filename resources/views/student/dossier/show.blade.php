<div class="card mt-4">
    <div class="card-header">
      Mon dossier
    </div>
    <div class="card-body">
        @if(auth()->user()->student->hasDossier())
          Dossier créé
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
