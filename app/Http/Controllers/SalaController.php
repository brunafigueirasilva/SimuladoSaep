<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Empresa;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function listar()
    {
        $salas = Sala::all();

        return view('salas.listar', compact('salas'));
    }

    public function create()
    {
        $empresas = Empresa::all();

        return view('salas.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        Sala::create([
            'n_sala' => $request->n_sala,
            'bloco' => $request->bloco,
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->back()->with('success','Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $sala = Sala::findOrFail($id);

        $empresas = Empresa::all();

        return view('salas.edit', compact('sala', 'empresas'));
    }

    public function update(Request $request, $id)
    {
        $sala = Sala::findOrFail($id);

        $sala->update([
            'n_sala' => $request->n_sala,
            'bloco' => $request->bloco,
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->back()->with('success','Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Sala::destroy($id);

        return redirect()->back()->with('success','Deletado com sucesso!');
    }
}