<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logement;

class LogementController extends Controller
{
    //

    public function index()
    {
        try {
            $logements = Logement::all();
            return view('pages.Logement.list', compact('logements'));
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des logements.');
        }
    }
    public function create(){
        try {
            return view('pages.Logement.create');
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'affichage du formulaire de création de logement.');
        }
    }

    public function store(Request $request){
        try {
            $logement = new Logement();
            $logement->titre = $request->input('titre');
            $logement->description = $request->input('description');
            $logement->adresse = $request->input('adresse');
            $logement->type = $request->input('type');
            $logement->superficie = $request->input('superficie');
            $logement->nombre_pieces = $request->input('nombre_pieces');
            $logement->prix = $request->input('prix');
            $logement->statut = 'disponible'; 
            $logement->image1 = $request->input('image1');
            $logement->image2 = $request->input('image2');
            $logement->image3 = $request->input('image3');  
            if ($request->hasFile('image1')) {
                $logement->image1 = $request->file('image1')->store('logement_images', 'public');
            }
             if ($request->hasFile('image2')) {
                $logement->image2 = $request->file('image2')->store('logement_images', 'public');
            }
             if ($request->hasFile('image3')) {
                $logement->image3 = $request->file('image3')->store('logement_images', 'public');
            }

            // Enregistrer le logement dans la base de données
            $logement->save();

            return redirect()->route('logement')->with('success', 'Logement créé avec succès.');
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du logement.');
        }
    }


    public function show($id){
        try {
            $logement = Logement::findOrFail($id);
            return view('pages.Logement.detail', compact('logement'));
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération du logement.');
        }
    }

    public function edit($id){
        try {
            $logement = Logement::findOrFail($id);
            return view('pages.Logement.edit', compact('logement'));
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération du logement pour l\'édition.');
        }
    }

    public function update(Request $request, $id){
        try {
            $logement = Logement::findOrFail($id);
            $logement->titre = $request->input('titre');
            $logement->description = $request->input('description');
            $logement->adresse = $request->input('adresse');
            $logement->type = $request->input('type');
            $logement->superficie = $request->input('superficie');
            $logement->nombre_pieces = $request->input('nombre_pieces');
            $logement->prix = $request->input('prix');
            if ($request->hasFile('image1')) {
                $logement->image1 = $request->file('image1')->store('logement_images', 'public');
            }
             if ($request->hasFile('image2')) {
                $logement->image2 = $request->file('image2')->store('logement_images', 'public');
            }
             if ($request->hasFile('image3')) {
                $logement->image3 = $request->file('image3')->store('logement_images', 'public');
            }

            // Enregistrer les modifications du logement dans la base de données
            $logement->save();

            return redirect()->route('logement')->with('success', 'Logement mis à jour avec succès.');
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour du logement.');
        }
    }

    public function destroy($id){
        try {
            $logement = Logement::findOrFail($id);
            $logement->delete();
            return redirect()->route('logement')->with('success', 'Logement supprimé avec succès.');
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple en affichant un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du logement.');
        }
    }


}

