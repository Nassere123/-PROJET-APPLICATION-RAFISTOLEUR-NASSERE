<?php

// app/Http/Controllers/RafistoleurController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rafistoleur;

class RafistoleurController extends Controller
{
    public function index()
    {
        $rafistoleurs = Rafistoleur::all();
        return response()->json($rafistoleurs, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'neighborhood' => 'required|string',
            'speciality' => 'required|string',
        ]);

        $rafistoleur = Rafistoleur::create($validated);

        return response()->json($rafistoleur, 201);
    }

    public function show($id)
    {
        $rafistoleur = Rafistoleur::findOrFail($id);
        return response()->json($rafistoleur, 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'neighborhood' => 'string',
            'speciality' => 'string',
        ]);

        $rafistoleur = Rafistoleur::findOrFail($id);
        $rafistoleur->update($validated);

        return response()->json($rafistoleur, 200);
    }

    public function destroy($id)
    {
        $rafistoleur = Rafistoleur::findOrFail($id);
        $rafistoleur->delete();

        return response()->json(['message' => 'Rafistoleur deleted'], 200);
    }
}
