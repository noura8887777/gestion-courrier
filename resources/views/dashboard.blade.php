@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body"> 
        
        
        <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
          <table>
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
                <th>Action</th>
              </tr>
        </thead>
        <tbody>
        <tr>
          @foreach ($listCourriers as $courrier)
             <td>{{$courrier->id}}</td>
             <td>{{$courrier->num_order_annuel}}</td>
             <td>{{$courrier->date}}</td>
             <td>{{$courrier->num_lettre}}</td>
             <td>{{$courrier->designation_destinataire}}</td>
             <td>{{$courrier->analyse_affaire}}</td>
             <td>{{$courrier->date_reponse}}</td>
             <td>{{$courrier->num_reponse}}</td>

             <td></td> 
          @endforeach
         
          
        </tr>
       
    </tbody>
        <tfoot>
        
    </tfoot>
      </table></div></div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
