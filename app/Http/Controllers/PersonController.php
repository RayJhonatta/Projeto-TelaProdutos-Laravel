<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{

    /**
     * Puxa todos os usuários do sistema. 
     */
    public function index()
    {
        $people = Person::all(); 
        return response()->json($people);
    }
    
    /**
     * Verificar se o usuário existe no sistema ou não. 
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $person = Person::where('email', $data['email'])->first();

        if (!$person || !Hash::check($data['password'], $person->password)) {
            return response()->json([
                'error' => 'Email ou senha inválido'
            ], 401);
        }

       return response()->json($person);
    }

    /**
     * Criar o usuário. 
     */
    public function store(Request $request)
    {
        $person = Person::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($person);
    } 

    /*fe
     * Puxa o usuário pelo id. 
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Atualizar os dados dos usuário. 
     */
    public function update(Request $request, string $id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                'message' => 'Usuário não encontrado'
            ], 404);
        }

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:person,email,' . $id,
            'password' => 'nullable|string|min:6'
        ]);

        $person->name = $data['name'];
        $person->email = $data['email'];

        if ($request->filled('password')) {
            $person->password = Hash::make($request->password);
        }

        $person->save();

        return response()->json($person, 200);

    }

    /**
     * Deletar os dados do usuário. 
     */
    public function destroy(string $id)
    {
        //
    }
}
