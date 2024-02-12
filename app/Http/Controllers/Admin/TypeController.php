<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('types', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $type = new Type();
        $type->fill($data);
        $type->slug = Str::of($type->name)->slug('-');
        $type->save();
        return redirect()->route('admin.types.index', $type)->with('message', 'Progetto creato correttamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types-edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();
        $type->name = $data['name'];
        $type->slug = Str::of($type['name'])->slug('-');
        $type->update();
        return redirect()->route('admin.types.index', $type)->with('message', 'Type aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index', $type)->with('message', 'Type cancellato correttamente');
    }
}
