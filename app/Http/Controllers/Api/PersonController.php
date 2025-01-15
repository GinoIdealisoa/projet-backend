<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // Afficher toutes les personnes
    public function index()
    {
        $people = Person::all();
        return response()->json($people);
    }

    // Afficher une personne spécifique
    public function show($id)
    {
        $person = Person::findOrFail($id);
        return response()->json($person);
    }

    // Ajouter une nouvelle personne
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'config' => 'nullable|json',
        ]);

        $person = Person::create([
            'name' => $request->name,
            'config' => $request->config,
        ]);

        return response()->json($person, 201);
    }

    // Mettre à jour une personne
    public function update(Request $request, $id)
    {
        $person = Person::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'config' => 'nullable|json',
        ]);

        $person->update($request->only(['name', 'config']));
        return response()->json($person);
    }

    // Supprimer une personne
    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        return response()->json(['message' => 'Person deleted successfully']);
    }
}