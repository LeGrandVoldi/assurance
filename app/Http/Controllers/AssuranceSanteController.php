<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Assurancesante;

class AssuranceSanteController extends Controller
{
    public function index() {
        return view('Assurances/Assurance--Santé/index');
    }

    public function search(Request $request) {
        $artist = Assurancesante::where('insurance_number', $request->insurance_number)->first();
        return view('Assurances/Assurance--Santé/result', [
            'artist' => $artist,
            'searched' => $request->insurance_number
        ]);
    }

    // Enregistrement d'un nouvel artiste + document
    public function create(Request $request) {
        // $request->validate([
        //     'name'=>'required|string',
        //     'insurance_number'=>'required|string|unique:artists,insurance_number',
        //     'insurance_file'=>'required|file|mimes:pdf,jpg,png|max:2048'
        // ]);
        $file    = $request->file('insurance_file');
        $name    = time().'.'.$file->getClientOriginalExtension();
        $path    = $file->storeAs('assurances/sante',$name,'public');
        Assurancesante::create([
            'name'=>$request->name,
            'insurance_number'=>$request->insurance_number,
            'insurance_file'=>$path
        ]);
        return redirect()->route('assurance.index')
                         ->with('success','Artiste et assurance enregistrés avec succès !');
    }

    // Ajout ou mise à jour du document existant
    public function update(Request $request, $id) {
        $request->validate(['insurance_file'=>'required|file|mimes:pdf,jpg,png|max:2048']);
        $artist = Assurancesante::findOrFail($id);
        $file   = $request->file('insurance_file');
        $name   = time().'.'.$file->getClientOriginalExtension();
        $path   = $file->storeAs('assurances/sante',$name,'public');
        $artist->update(['insurance_file'=>$path]);
        return redirect()->route('assurance.index')
                         ->with('success','Document d’assurance mis à jour !');
    }
}
