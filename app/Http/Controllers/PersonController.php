<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $person = Person::all();

       return $person;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = Person::where('email', $request->email)->first();

        if (!$person) {
            return response()->json(['error' => 'Informações inválidas'], 401);
        }

        if(!Hask::check($request->password, $person->password)) {
            return response->json(['error' => 'Senha incorreta'], 401);
        }
        
        return response->json($person);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
