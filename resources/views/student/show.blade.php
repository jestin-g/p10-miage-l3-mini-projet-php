<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                Mon profil
            </div>
            @if(auth()->user()->hasStudent())
            <div class="col">
                <form action="{{ route('students.edit', auth()->user()->student) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary float-right">modifier</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if(auth()->user()->hasStudent())
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">Nom</th>
                <td>{{ $student->name ?? 'à renseigner'}}</td>
              </tr>
              <tr>
                <th scope="row">Prénom</th>
                <td>{{ $student->surname ?? 'à renseigner'}}</td>
              </tr>
              <tr>
                <th scope="row">Numéro carte étudiante</th>
                <td>{{ $student->num_student_card ?? 'à renseigner'}}</td>
              </tr>
              <tr>
                <th scope="row">Date de naissance</th>
                <td>{{ \Carbon\Carbon::parse($student->birth_date)->translatedFormat('j F, Y') ?? 'à renseigner'}}</td>
              </tr>
              <tr>
                <th scope="row">Adresse postale</th>
                <td>{{ $student->address ?? 'à renseigner'}}</td>
              </tr>
              <tr>
                <th scope="row">Numéro de téléphone</th>
                <td>{{ $student->phone_number ?? 'à renseigner'}}</td>
              </tr>
            </tbody>
          </table>
        @else
        <td>
            <form action="{{ route('students.init')}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-success">Créer mon profil étudiant</button>
            </form>
        </td>
        @endif
    </div>
</div>
