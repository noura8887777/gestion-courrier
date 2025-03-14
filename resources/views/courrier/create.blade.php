@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un nouveau courrier</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('courrier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num_order_annuel">Numéro d'ordre annuel<span class="text-danger">*</span></label>
                        <input type="text" name="num_order_annuel" id="num_order_annuel" class="form-control" value="{{ old('num_order_annuel') }}" required>
                        @error('num_order_annuel')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_lettre">Date de lettre<span class="text-danger">*</span></label>
                        <input type="date" name="date_lettre" id="date_lettre" class="form-control=" value="{{ old('date_lettre') }}" required>
                        @error('date_lettre')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_lettre">Numéro de lettre<span class="text-danger">*</span></label>
                        <input type="text" name="num_lettre" id="num_lettre" class="form-control" value="{{ old('num_lettre') }}" required>
                        @error('num_lettre')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="designation_destinataire">Destinataire<span class="text-danger">*</span></label>
                        <input type="text" name="designation_destinataire" id="designation_destinataire" class="form-control is-invalid" value="{{ old('designation_destinataire') }}" required>
                        @error('designation_destinataire')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="analyse_affaire">Analyse de l'affaire<span class="text-danger">*</span></label>
                        <textarea name="analyse_affaire" id="analyse_affaire" class="form-control is-invalid" rows="3" required>{{ old('analyse_affaire') }}</textarea>
                        @error('analyse_affaire')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fichier">Fichier du courrier<span class="text-danger">*</span></label>
                        <input type="file" name="fichier" class="form-control is-invalid" required>
                        @error('fichier')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_reponse">Date de réponse</label>
                        <input type="date" name="date_reponse" id="date_reponse" class="form-control is-invalid" value="{{ old('date_reponse') }}">
                        @error('date_reponse')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_reponse">Numéro de réponse</label>
                        <input type="text" name="num_reponse" id="num_reponse" class="form-control is-invalid " value="{{ old('num_reponse') }}">
                        @error('num_reponse')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    

                    <div class="form-group">
                        <label for="type_courrier_id">Type de courrier<span class="text-danger">*</span></label>
                        <select name="type_courrier_id" id="type_courrier_id" class="form-control is-invalid" required>
                            <option value="">Sélectionner un type</option>
                            @foreach($types as $id => $nom_type)
                                <option value="{{ $id }}" {{ old('type_courrier_id') == $id ? 'selected' : '' }}>
                                    {{ $nom_type }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_courrier_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="statut_id">Statut<span class="text-danger">*</span></label>
                        <select name="statut_id" id="statut_id" class="form-control is-invalid r" required>
                            <option value="">Sélectionner un statut</option>
                            @foreach($statuts as $id => $nom_statut)
                                <option value="{{ $id }}" {{ old('statut_id') == $id ? 'selected' : '' }}>
                                    {{ $nom_statut }}
                                </option>
                            @endforeach
                        </select>
                        @error('statut_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('courrier.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
