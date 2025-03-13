<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\TypeCourrier;
use App\Models\Fichier;
use App\Models\Statut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class courrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCourriers=Courrier::paginate(10);
        // dd($listCourriers);
        return view("courrier.index",compact('listCourriers'));
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
            'fichier' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);
            // insertion du fichier: 1- upload 2-insertion ligne f table fichier

            
            $fichier=new Fichier();
            $fichier->chemin='';
            $fichier->save();


            DB::table('courriers')->insert([
                'num_order_annuel' => $request->num_order_annuel,
                'date_lettre' => $request->date_lettre,
                'num_lettre' => $request->num_lettre,
                'designation_destinataire' => $request->designation_destinataire,
                'analyse_affaire' => $request->analyse_affaire,
                'date_reponse' => $request->date_reponse,
                'num_reponse' => $request->num_reponse,
                'type_courrier_id' => $request->type_courrier_id,
                'statut_id' => $request->statut_id,
                'user_id' => auth()->id(),
                'date' => now(),
                'fichier_id' =>$fichier->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return redirect()->route('courrier.index')
                ->with('success', 'Courrier créé avec succès');
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
        
            $listcourrier = Courrier::with(['users','affectations','affectations.users','type_courriers','statuts'])->findOrFail($id);
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
            $currierMod = Courrier::with(['type_courriers', 'statuts'])->findOrFail($id);
            return view('courrier.edit', compact('currierMod'));
            return redirect()->route('courrier.index')->with('error', 'Courrier non trouvé');
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
        ]);
        DB::table('courriers')->where('id',$id)->update([
            'num_order_annuel' => $request->num_order_annuel,
            'date_lettre' => $request->date_lettre,
            'num_lettre' =>$request->num_lettre,
            'designation_destinataire' => $request->designation_destinataire,
            'analyse_affaire' => $request->analyse_affaire,
            'date_reponse' => $request->date_reponse,
            'num_reponse' => $request->num_reponse,
            'type_courrier_id'=> $request->statut_id
        ]);

            return redirect()->route('courrier.index')
                ->with('success', 'Courrier modifié avec succès');
            return back()->with('error', 'Erreur lors de la modification du courrier: ')
                ->withInput();
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
