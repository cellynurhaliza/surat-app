<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\LetterType;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letterTypes = LetterType::all();
        return view('order.letterType.index', compact('letterTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $letterTypes = LetterType::all();
        // return view("order.letterType.create", compact('letterTypes'));
        return view("order.letterType.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);

        // $namePrefix = substr($request->nama, 0, 3);

        LetterType::create([
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ]);

        return redirect()->route('order.letterType.index')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterType $letterType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LetterType $letterType, $id)
    {
        $letterTypes = LetterType::find($id);
        return view('order.letterType.edit', compact('letterTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LetterType $letterType, $id)
    {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);

        $ubahData = [
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ];

        LetterType::where('id', $id)->update($ubahData);

        return redirect()->route('order.letterType.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LetterType $letterType, $id)
    {
        LetterType::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data berhasil di hapus!');
    }

    public function detail($id){
        $letterTypes = LetterType::find($id);
        return view('order.letterType.detail', compact('letterTypes'));
    }

    public function download($id){
        $letterTypes = LetterType::find($id)->toArray();
        view()->share('letterTypes', $letterTypes);
        $pdf = PDF::loadView('order.letterType.download', $letterTypes);
        return $pdf->download('receipt.pdf');   
    }

}
