@extends('layouts.app')  

@section('content')    
<div class="card card-primary">     
    <div class="card-header">       
        <h3 class="card-title">Détails d'un utilisateur</h3>        
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
        <ul class="list-group">
            @if($usersDetail instanceof \Illuminate\Database\Eloquent\Collection)
                @foreach ($usersDetail as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>{{ $user->name }}</strong> 
                        <span class="badge badge-info">
                            {{ $user->role ? $user->role->name : 'Aucun rôle' }}
                        </span> 
                        <span class="small text-muted">{{ $user->email }}</span>
                    </li>
                @endforeach
            @else
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>{{ $usersDetail->name }}</strong> 
                    <span class="badge badge-info">
                        {{ $usersDetail->roles->nom_role }}
                    </span> 
                    <span class="small text-muted">{{ $usersDetail->email }}</span>
                </li>
            @endif
        </ul>
    </div>     

    <div class="card-footer text-muted">       
        Dernière mise à jour : {{ now()->format('d/m/Y H:i') }}    
    </div>   
</div>   
@endsection
