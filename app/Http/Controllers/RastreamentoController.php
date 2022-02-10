<?php

namespace App\Http\Controllers;

use App\Rastreamento;
use Illuminate\Http\Request;

class RastreamentoController
{
    public function index()
    {
        return view('rastreamento.index');
    }


    public function datatable()
    {
        return Rastreamento::where('user_id', auth()->id())->get();
    }

    public function create()
    {
        return view('rastreamento.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['url' => 'required|url']);

        Rastreamento::firstOrCreate(array_merge(['user_id' => auth()->id()], $validated));

        return redirect()->route('rastreamentos.index')->with('status', 'URL cadastrada para rastreamento!');
    }

    public function show(int $id)
    {
        $rastreamento = Rastreamento::where('user_id', auth()->id())->whereNotNull('updated_at')->find($id);
        if (null === $rastreamento) {
            return redirect()->back();
        }

        return view('rastreamento.show', compact('rastreamento'));
    }
}
