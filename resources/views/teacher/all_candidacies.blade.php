<div class="card">
    <div class="card-header">
        <div class="row">
            Toutes les candidatures
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Niveau</th>
                  <th scope="col">Statut</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              @foreach ($candidacies as $candidacy)
              <tbody>
                <tr>
                  <th scope="row">1</th>
                    <td>{{ $candidacy->name }} {{ $candidacy->surname }}</td>
                    <td>{{ $candidacy->grade_label }}</td>
                    <td>{{ $candidacy->status_label }}</td>
                    <td>
                        <form action="{{route('candidacy.show',[$candidacy->candidacy_id])}}" method="POST">
                            @method('GET')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">voir</button>               
                        </form>
                    </td>
                </tr>
              </tbody>
              @endforeach
          </table>
    </div>
</div>