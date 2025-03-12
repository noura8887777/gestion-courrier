@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le courrier</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('courrier.update', $currierMod->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num_order_annuel">Numéro d'ordre annuel</label>
                        <input type="text" name="num_order_annuel" id="num_order_annuel" class="form-control @error('num_order_annuel') is-invalid @enderror" value="{{ old('num_order_annuel', $currierMod->num_order_annuel) }}">
                        @error('num_order_annuel')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_lettre">Date de lettre</label>
                        <input type="date" name="date_lettre" id="date_lettre" class="form-control" value="{{ old('date_lettre', $currierMod->date_lettre) }}">
                        @error('date_lettre')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_lettre">Numéro de lettre</label>
                        <input type="text" name="num_lettre" id="num_lettre" class="form-control" value="{{ old('num_lettre', $currierMod->num_lettre) }}">
                        @error('num_lettre')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="designation_destinataire">Destinataire</label>
                        <input type="text" name="designation_destinataire" id="designation_destinataire" class="form-control" value="{{ old('designation_destinataire', $currierMod->designation_destinataire) }}">
                        @error('designation_destinataire')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="analyse_affaire">Analyse de l'affaire</label>
                        <textarea name="analyse_affaire" id="analyse_affaire" class="form-control" rows="3">{{ old('analyse_affaire', $currierMod->analyse_affaire) }}</textarea>
                        @error('analyse_affaire')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_reponse">Date de réponse</label>
                        <input type="date" name="date_reponse" id="date_reponse" class="form-control" value="{{ old('date_reponse', $currierMod->date_reponse) }}">
                        @error('date_reponse')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_reponse">Numéro de réponse</label>
                        <input type="text" name="num_reponse" id="num_reponse" class="form-control" value="{{ old('num_reponse', $currierMod->num_reponse) }}">
                        @error('num_reponse')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type_courrier_id">Type de courrier</label>
                        <select name="type_courrier_id" id="type_courrier_id" class="form-control">
                            <option value="">Sélectionner un type</option>
                            @foreach(\App\Models\TypeCourrier::all() as $type)
                                <option value="{{ $type->id }}" {{ old('type_courrier_id', $currierMod->type_courrier_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->nom_type }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_courrier_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="statut_id">Statut</label>
                        <select name="statut_id" id="statut_id" class="form-control @error('statut_id') is-invalid @enderror">
                            <option value="">Sélectionner un statut</option>
                            @foreach(\App\Models\Statut::all() as $statut)
                                <option value="{{ $statut->id }}" {{ old('statut_id', $currierMod->statut_id) == $statut->id ? 'selected' : '' }}>
                                    {{ $statut->nom_statut }}
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
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                <a href="{{ route('courrier.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Add any JavaScript for form handling here
    });
</script>
@endpush
