<?php
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Address::where('street', 'like', "%$katakunci%")
                ->orWhere('city', 'like', "%$katakunci%")
                ->orWhere('province', 'like', "%$katakunci%")
                ->orWhere('country', 'like', "%$katakunci%")
                ->orWhere('postal_code', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Address::orderBy('street', 'desc')->paginate($jumlahbaris);
        }
        return view('AddressView.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddressView.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ], [
            'street.required' => 'Street wajib diisi',
            'city.required' => 'City wajib diisi',
            'province.required' => 'Province wajib diisi',
            'country.required' => 'Country wajib diisi',
            'postal_code.required' => 'Postal Code wajib diisi',
        ]);
        $data = [
            'street' => $request->street,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ];
        Address::create($data);
        return redirect()->to('Address')->with('success', 'Berhasil Menambahkan Address');
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
    public function edit(string $id)
    {
        $data = Address::where('id', $id)->first();
        return view('AddressView.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ], [
            'street.required' => 'Street wajib diisi',
            'city.required' => 'City wajib diisi',
            'province.required' => 'Province wajib diisi',
            'country.required' => 'Country wajib diisi',
            'postal_code.required' => 'Postal Code wajib diisi',
        ]);
        $data = [
            'street' => $request->street,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ];
        Address::where('id', $id)->update($data);
        return redirect()->to('Address')->with('success', 'Berhasil Melakukan Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Address::where('id', $id)->delete();
        return redirect()->to('Address')->with('success', 'Berhasil Menghapus Data');
    }
}
