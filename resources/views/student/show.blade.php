<div class="card">
    <div class="card-header">Mon profil</div>
    <div class="card-body">
        @if(auth()->user()->student()->exists())

        @else
        <td>
            <form action="{{ route('student.students.store')}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-primary">Créer mon profil</button>
            </form>
        </td>
        @endif
    </div>
</div>
