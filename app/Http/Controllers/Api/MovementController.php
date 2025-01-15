<?php

namespace App\Http\Controllers;

use App\Models\Mouvement;
use App\Models\Person;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    // Afficher tous les déplacements ou seulement ceux de l'utilisateur
    public function index()
    {
        if (auth()->user()->is_admin) {
            $movements = Mouvement::all();
        } else {
            $movements = Mouvement::where('person_id', auth()->id())->get();
        }

        return response()->json($movements);
    }

    // Ajouter un nouveau déplacement
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'person_id' => 'required|exists:people,id',
        ]);

        $movement = Mouvement::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'person_id' => $request->person_id,
            'timestamp' => now(),
        ]);

        return response()->json($movement, 201);
    }

    // Afficher un seul déplacement
    public function show($id)
    {
        $movement = Mouvement::findOrFail($id);

        if (auth()->user()->is_admin || $movement->person_id == auth()->id()) {
            return response()->json($movement);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    }

    // Mettre à jour un déplacement
    public function update(Request $request, $id)
    {
        $movement = Mouvement::findOrFail($id);

        if (auth()->user()->is_admin || $movement->person_id == auth()->id()) {
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $movement->update([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'timestamp' => now(),
            ]);

            return response()->json($movement);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    }

    // Supprimer un déplacement
    public function destroy($id)
    {
        $movement = Mouvement::findOrFail($id);

        if (auth()->user()->is_admin || $movement->person_id == auth()->id()) {
            $movement->delete();
            return response()->json(['message' => 'Movement deleted successfully']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    }
}