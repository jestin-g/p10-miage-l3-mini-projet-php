<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                Mon profil
            </div>
            @if(auth()->user()->student()->exists())
            <div class="col">
                <form action="{{ route('student.students.edit', auth()->user()->student) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary float-right">modifier</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if(auth()->user()->student()->exists())

        @else
        <td>
            <form action="{{ route('student.students.store')}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-success">Créer mon profil étudiant</button>
            </form>
        </td>
        @endif
    </div>
</div>
