@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Utilisateurs</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôle</th>
                            <th colspan="2" scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn btn-primary">Modif.</button></a>
                                </td>
                                <td>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Suppr.</button>
                                </form>
                                </td>
                              </tr>  
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
