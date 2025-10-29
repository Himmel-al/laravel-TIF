<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData['datacustomer'] = Customer::all();
        return view('admin.customer.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Customer.create');
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

        Customer::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('pelanggan.list')->with('success', 'Penambahan Data Berhasil!');

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

        $pageData['dataCustomer'] = Customer::findOrFail($param1);
        return view('admin.Customer.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
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

        $customer_id = $request->customer_id;
        $customer = Customer::findOrFail($customer_id);

        $customer->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('pelanggan.list')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.list')->with('success', 'Data berhasil dihapus');
    }
}
