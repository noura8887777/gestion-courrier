@extends('layouts.app')

@section('content')
   <!-- Default box -->
   <div class="card">
    <div class="card-header">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
      <h3 class="card-title">Liste des utilisateurs</h3>
      <div>
         <a href="{{route("user.create")}}"  class="btn btn-info btn-sm">Ajouter Utilisateur</a>
      </div>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Réduire">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Fermer">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $index => $user)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">
                  <i class="fas fa-eye"></i> Détails
                </a>

                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                    <i class="fas fa-trash"></i> Supprimer
                  </button>
                </form>
                 <a href="{{ route('user.edit', $user->id) }}"  class="btn btn-info btn-sm">Modifier</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="card-footer text-muted">
      Nombre total d'utilisateurs : {{ count($users) }}
    </div>
  </div>
@endsection
