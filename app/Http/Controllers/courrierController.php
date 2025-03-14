<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\TypeCourrier;
use App\Models\Fichier;
use App\Models\Statut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class courrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCourriers = Courrier::with('fichier')->paginate(10);
        return view("courrier.index", compact('listCourriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $types = TypeCourrier::pluck('nom_type', 'id')->unique();
        $statuts = Statut::pluck('nom_statut', 'id')->unique();
            
        return view('courrier.create', compact('types', 'statuts'));
        // retyrn json_decode
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_order_annuel' => 'required|string|max:255',
            'date_lettre' => 'required|date',
            'num_lettre' => 'required|string|max:255',
            'designation_destinataire' => 'required|string|max:255',
            'analyse_affaire' => 'required|string',
            'date_reponse' => 'nullable|date',
            'num_reponse' => 'nullable|string|max:255',
            'type_courrier_id' => 'required|exists:type_courriers,id',
            'statut_id' => 'required|exists:statuts,id',
            'fichier' => 'required|file|mimes:pdf,doc,docx,xlsx|max:2048'
        ]);

            // 1. Upload du fichier
            if ($request->hasFile('fichier')) {
                $file = $request->file('fichier');
                $nom_fichier = 'courrier_' . time() . '.' .'pdf';
                $file->storeAs('courriers', $nom_fichier, 'public');

                // 2. Insertion dans la table fichier
                $fichier = new Fichier();
                // $fichier->nom = $file->getClientOriginalName();
                $fichier->chemin = $nom_fichier;
                $fichier->save();

                // 3. Création du courrier
                $courrier = new Courrier();
                $courrier->num_order_annuel = $request->input('num_order_annuel');
                $courrier->date_lettre = $request->input('date_lettre');
                $courrier->num_lettre = $request->input('num_lettre');
                $courrier->designation_destinataire = $request->input('designation_destinataire');
                $courrier->analyse_affaire = $request->input('analyse_affaire');
                $courrier->date_reponse = $request->input('date_reponse');
                $courrier->num_reponse = $request->input('num_reponse');
                $courrier->type_courrier_id = $request->input('type_courrier_id');
                $courrier->statut_id = $request->input('statut_id');
                $courrier->user_id = auth()->id();
                $courrier->date = now();
                $courrier->fichier_id = $fichier->id;
                $courrier->save();
                return redirect()->route('courrier.index')->with('success', 'Courrier créé avec succès');
            }
            return back()
                ->with('error', 'Erreur lors de la création du courrier ')
                ->withInput();
        }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            $listcourrier = Courrier::with(['users','affectations','affectations.users','type_courriers','statuts','fichier'])->findOrFail($id);
            return view('courrier.show', compact('listcourrier'));
            return redirect()->route('dashboard')->with('error', 'Courrier non trouvé');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $currierMod = Courrier::with(['fichier', 'type_courriers', 'statuts'])->findOrFail($id);
            $types = TypeCourrier::pluck('nom_type', 'id');
            $statuts = Statut::pluck('nom_statut', 'id');
            
            return view('courrier.edit', compact('currierMod', 'types', 'statuts'));
            return redirect()->route('courrier.index')
                ->with('error', 'Courrier non trouvé');
        }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'num_order_annuel' => 'required|string|max:255',
            'date_lettre' => 'required|date',
            'num_lettre' => 'required|string|max:255',
            'designation_destinataire' => 'required|string|max:255',
            'analyse_affaire' => 'required|string',
            'date_reponse' => 'nullable|date',
            'num_reponse' => 'nullable|string|max:255',
            'type_courrier_id' => 'required|exists:type_courriers,id',
            'statut_id' => 'required|exists:statuts,id',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,xlsx|max:20485'
        ]);
            $courrier = Courrier::findOrFail($id);
            
            
            if ($request->hasFile('fichier')) {
                $file = $request->file('fichier');
                $nom_fichier = 'courrier_' . $courrier->id . '.' .'pdf';
                
                // Supprimer
                if ($courrier->fichier) {
                    Storage::disk('public')->delete('courriers/' . $courrier->fichier->chemin);
                    $fichier = Fichier::find($courrier->fichier->id);
                    $fichier->chemin =$nom_fichier ;
                    $fichier->save();
                }

                // stokage 
                $file->storeAs('courriers', $nom_fichier, 'public');
            }
            $courrier->num_order_annuel = $request->input('num_order_annuel');
            $courrier->date_lettre = $request->input('date_lettre');
            $courrier->num_lettre = $request->input('num_lettre');
            $courrier->designation_destinataire = $request->input('designation_destinataire');
            $courrier->analyse_affaire = $request->input('analyse_affaire');
            $courrier->date_reponse = $request->input('date_reponse');
            $courrier->num_reponse = $request->input('num_reponse');
            $courrier->type_courrier_id = $request->input('type_courrier_id');
            $courrier->statut_id = $request->input('statut_id');
            $courrier->save();

            return redirect()->route('courrier.index')
                ->with('success', 'Courrier mis à jour avec succès');
            return back()
                ->with('error', 'Erreur lors de la modification du courrier ')
                ->withInput();
        
    }
    


    public function showFile($id)
    {
            $courrier = Courrier::with('fichier')->findOrFail($id);
            
            if (!$courrier->fichier) {
                return back()->with('error', 'Aucun fichier trouve pour ce courrier');
            }

            $filePath = storage_path('app/public/courriers/' . $courrier->fichier->chemin);
            
            if (!file_exists($filePath)) {
                return back()->with('error', 'Le fichier n\'existe pas');
            }

            return response()->file($filePath);
            return back()->with('error', 'Erreur lors de l\'affichage du fichier');
        
    }


   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Courrier::find($id)->delete();
        return redirect()->route('courrier.index');
    }
}
