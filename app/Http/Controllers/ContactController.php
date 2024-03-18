<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = Contact::where('first_name', 'like', "%$katakunci%")
            ->orWhere('last_name', 'like', "%$katakunci%")
            ->orWhere('phone', 'like', "%$katakunci%")
            ->orWhere('email', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
        $data = Contact::orderBy('first_name', 'desc')->paginate($jumlahbaris);
        }
        return view('ContactView.index')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ContactView.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ],[
            'first_name.required' => 'First Name wajib diisi',
            'last_name.required' => 'Last Name wajib diisi',
            'phone.required' => 'Nomor Telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
        ]);
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ];
        Contact::create($data);
        return redirect()->to('Contact')->with('success','Berhasil Menambahkan Contact');
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
        $data = Contact::where('id',$id)->first();
        return view('ContactView.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ],[
            'first_name.required' => 'First Name wajib diisi',
            'last_name.required' => 'Last Name wajib diisi',
            'phone.required' => 'Nomor Telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
        ]);
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ];
        Contact::where('id',$id)->update($data);
        return redirect()->to('Contact')->with('success','Berhasil Melakukan Uppdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->to('Contact')->with('success', 'Berhasil Delete Data');
    }
}
