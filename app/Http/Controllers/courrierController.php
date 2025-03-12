<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;

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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            Courrier::update([
                'num_order_annuel' => $request->num_order_annuel,
            'date_lettre' => $request->date_lettre,
            'num_lettre' =>$request->num_lettre,
            'designation_destinataire' => $request->designation_destinataire,
            'analyse_affaire' => $request->analyse_affaire,
            'date_reponse' => $request->date_reponse,
            'num_reponse' => $request->num_reponse,
            'type_courrier_id'=> $request->statut_id
            ]);

            return redirect()->route('courrier.show')
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
        //
    }
}
