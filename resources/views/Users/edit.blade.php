@extends('layouts.app')
@section('content')
<form action="{{route('user.update' , $userUpdated->id)}}" method="post">   
              @csrf  
              @method("put")    
                <h1>Modifier un Utilisateur </h1>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1" >Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email"  value="{{$userUpdated->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter nom" name="name"  value="{{$userUpdated->name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="role_id" class="form-select " required>
                            <option value="">Sélectionner un role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->role_id }}" {{ ($userUpdated->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->nom_role }}
                                </option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"  value="{{$userUpdated->password}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" >Enregistrer les modifications </button>
                </div>
              </form>
@endsection