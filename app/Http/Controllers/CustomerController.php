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
        $pageData['dataCustomer'] = Customer::all();
        return view('admin.customer.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_line'             => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'postal_code'              => 'required|numeric',
            'country'                  => 'required',
            'membership_type'          => 'required|in:Regular,Premium,VIP',
            'registration_date'        => 'required|date',
            'last_purchase_date'       => 'nullable|date',
            'total_spent'              => 'required|numeric',
            'preferred_contact_method' => 'required|in:Email,Telepon,SMS',
        ]);

        $registration_date  = date('Y-m-d', strtotime(str_replace('/', '-', $request->registration_date)));
        $last_purchase_date = $request->last_purchase_date
            ? date('Y-m-d', strtotime(str_replace('/', '-', $request->last_purchase_date)))
            : null;

        Customer::create([
            'address_line'             => $request->address_line,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'postal_code'              => $request->postal_code,
            'country'                  => $request->country,
            'membership_type'          => $request->membership_type,
            'registration_date'        => $registration_date,
            'last_purchase_date'       => $last_purchase_date,
            'total_spent'              => $request->total_spent,
            'preferred_contact_method' => $request->preferred_contact_method,
        ]);

        return redirect()->route('customer.index')->with('success', 'Penambahan Data Berhasil!');
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
        return view('admin.customer.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address_line'             => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'postal_code'              => 'required|numeric',
            'country'                  => 'required',
            'membership_type'          => 'required|in:Regular,Premium,VIP',
            'registration_date'        => 'required|date',
            'last_purchase_date'       => 'nullable|date',
            'total_spent'              => 'required|numeric',
            'preferred_contact_method' => 'required|in:Email,Telepon,SMS',
        ]);

        $registration_date  = date('Y-m-d', strtotime(str_replace('/', '-', $request->registration_date)));
        $last_purchase_date = $request->last_purchase_date
            ? date('Y-m-d', strtotime(str_replace('/', '-', $request->last_purchase_date)))
            : null;

        $customer = Customer::findOrFail($id);
        $customer->update([
            'address_line'             => $request->address_line,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'postal_code'              => $request->postal_code,
            'country'                  => $request->country,
            'membership_type'          => $request->membership_type,
            'registration_date'        => $registration_date,
            'last_purchase_date'       => $last_purchase_date,
            'total_spent'              => $request->total_spent,
            'preferred_contact_method' => $request->preferred_contact_method,
        ]);

        return redirect()->route('customer.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Data berhasil dihapus');
    }
}
