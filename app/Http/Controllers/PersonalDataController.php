<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    // Muestra una lista de datos personales
    public function index( int $id = null)
    {
        if (PersonalData::count() == 0) {
            return redirect()->route('personal_data.create');
        }

        if ($id) {
            $personalData = PersonalData::find($id);

            if (!$personalData) {
                abort(404, 'Personal Data not found');
            }

            return view('personal_data.show', compact('personalData'));
        }
        $personalData = PersonalData::all();
        return view('personal_data.index', compact('personalData'));
    }

    // Muestra el formulario para crear un nuevo dato personal
    public function create()
    {
        return view('personal_data.create');
    }

    // Almacena un nuevo dato personal
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personal_data',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoUrl = null;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = $image->store('public/images');
            $photoUrl = Storage::url($path);
        }

        $personalData = $request->all();
        $personalData['photo_url'] = $photoUrl;

        PersonalData::create($personalData);

        return redirect()->route('personal_data.index')->with('success', 'Personal data created successfully.');
    }

    // Muestra un dato personal específico
    public function show(int $id)
    {
        $personalData = PersonalData::find($id);

        if (!$personalData) {
            abort(404, 'Personal Data not found');
        }
        return view('personal_data.show', compact('personalData'));
    }

    // Muestra el formulario para editar un dato personal existente
    public function edit( int $id )
    {
        $personalData = PersonalData::find($id);

        if (!$personalData) {
            abort(404, 'Personal Data not found');
        }

        return view('personal_data.edit', compact('personalData'));
    }

    // Actualiza un dato personal específico
    public function update(Request $request, PersonalData $personalData)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personal_data,email,' . $personalData->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'presentation' => 'nullable|string',
            'description'=> 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $personalData->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'presentation' => $request->input('presentation'),
            'description' => $request->input('description'),
        ]);


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = $image->store('public/images');
            $photoUrl = Storage::url($path);

            if ($personalData->photo_url) {
                $filename = basename($personalData->photo_url);

                if (Storage::exists('public/images/' . $filename)) {
                    Storage::delete('public/images/' . $filename);
                }
            }

            $personalData->update(['photo_url' => $photoUrl]);
        }
        return redirect()->route('personal_data.index')->with('success', 'Personal data updated successfully.');

    }

}
