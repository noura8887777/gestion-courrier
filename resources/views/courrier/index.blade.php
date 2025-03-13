@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Liste des Courriers </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body"> 
      
        <div class="row"><div class="col-sm-12">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>#</th>
                <th>Num Order Annuel</th>
                <th>Date Lettre</th>
                <th>Num Lettre</th>
                <th>Designation Destinataire</th>
                <th>Analyse Affaire</th>
                <th>Date Reponse</th>
                <th>Num Reponse</th>
              </tr>
        </thead>
        <tbody>
          @foreach ($listCourriers as $courrier)

          <tr>
             <td>{{$courrier->id}}</td>
             <td>{{$courrier->num_order_annuel}}</td>
             <td>{{$courrier->date}}</td>
             <td>{{$courrier->num_lettre}}</td>
             <td>{{$courrier->designation_destinataire}}</td>
             <td>{{ Str::limit($courrier->analyse_affaire, 27) }}</td>
             <td>{{$courrier->date_reponse}}</td>
             <td>{{$courrier->num_reponse}}</td>
            </tr> 
            
          @endforeach
    </tbody>
    {{$listCourriers->links()}}
        <tfoot>
        
    </tfoot>
      </table></div></div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
