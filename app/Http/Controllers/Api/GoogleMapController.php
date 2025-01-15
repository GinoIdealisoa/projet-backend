<?php

namespace App\Http\Controllers;

use App\Models\Mouvement;
use Illuminate\Http\Request;

class GoogleMapController extends Controller
{
    // Récupérer les données pour afficher les déplacements sur la carte
    public function getMovementsForMap()
    {
        // Récupérer tous les mouvements pour l'administrateur ou les mouvements de l'utilisateur connecté
        $movements = auth()->user()->is_admin
            ? Mouvement::all()
            : Mouvement::where('person_id', auth()->id())->get();

        return response()->json($movements);
    }
}