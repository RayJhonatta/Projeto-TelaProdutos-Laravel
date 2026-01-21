<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    function index() {
        Person::all();
    }

    function store(Request $request) {
        $validateData = $request->validate();
        $person = Person::create($validateData);
    }

    function show() {
        //
    }

    function update() {
        //
    }

    function destroy() {
        //
    }
}
