@extends('layouts.app')
@section('content')
<form action="{{route("user.store")}}" method="post">   
              @csrf       
                <h1>Ajouter un Utilisateur </h1>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter nom" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Role</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter role_id" name="role_id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" >Enregistrer</button>
                </div>
              </form>
@endsection