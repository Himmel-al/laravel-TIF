<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'birthday'   => ['required', 'date'],
            'gender'     => ['required', 'in:Male,Female'],
            'email'      => ['required', 'email', 'unique:pelanggan,email'],
            'phone'      => ['required', 'numeric'],
        ]);

        $birthday = date('Y-m-d', strtotime(str_replace('/', '-', $request->birthday)));

        Pelanggan::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {

        $pageData['dataPelanggan'] = Pelanggan::findOrFail($param1);
        return view('admin.pelanggan.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'birthday'   => ['required', 'date'],
            'gender'     => ['required', 'in:Male,Female'],
            'email'      => ['required', 'email'],
            'phone'      => ['required', 'numeric'],
        ]);

        $birthday = date('Y-m-d', strtotime(str_replace('/', '-', $request->birthday)));

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
