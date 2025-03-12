@extends('layouts.app')

@section('content')
   <div class="card">
    <div class="card-header">
      <h3 class="card-title">Détails du Courrier</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th style="width: 200px">ID</th>
                <td>{{ $listcourrier->id }}</td>
              </tr>
              <tr>
                <th>Numéro d'ordre annuel</th>
                <td>{{ $listcourrier->num_order_annuel ?? 'Non défini' }}</td>
              </tr>
              <tr>
                <th>Date de lettre</th>
                <td>{{ $listcourrier->date_lettre ?? 'Non définie' }}</td>
              </tr>
              <tr>
                <th>Numéro de lettre</th>
                <td>{{ $listcourrier->num_lettre }}</td>
              </tr>
              <tr>
                <th>Destinataire</th>
                <td>{{ $listcourrier->designation_destinataire }}</td>
              </tr>
              <tr>
                <th>Analyse de l'affaire</th>
                <td>{{ $listcourrier->analyse_affaire}}</td>
              </tr>
              <tr>
                <th>Date de réponse</th>
                <td>{{ $listcourrier->date_reponse}}</td>
              </tr>
              <tr>
                <th>Numéro de réponse</th>
                <td>{{ $listcourrier->num_reponse}}</td>
              </tr>
              <tr>
                <th>Créé par</th>
                <td>{{$listcourrier->users->name}}</td>
              </tr>
              <tr>
                <th>Type de courrier</th>
                <td>{{$listcourrier->type_courriers->nom_type}}</td>
              </tr>
              <tr>
                <th>Statut</th>
                <td>{{$listcourrier->statuts->nom_statut}}</td>
              </tr>
            </table>
          </div>
          @if( $listcourrier->affectations->count()>0)
          <h4 class="mt-4">Affectations</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Utilisateur</th>
                  <th>Date d'affectation</th>
                  <th>duree de reponse </th>
                  <th>reponse</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listcourrier->affectations as $affectation)
                <tr>
                  <td>{{$affectation->users->name}}</td>
                  <td>{{ $affectation->created_at ? $affectation->created_at->format('d/m/Y H:i') : 'Non définie' }}</td>
                  <td>{{$affectation->duree_reponse }} jours</td>
                  <td>{{$affectation->reponse == 1 ? 'true' : 'false' }}</td>
                
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <a href="{{ route('courrier.index') }}" class="btn btn-secondary">Retour à la liste</a>
      <a href="{{ route('courrier.edit', $listcourrier->id) }}" class="btn btn-primary">Modifier</a>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
@endsection 