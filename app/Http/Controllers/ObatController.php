<?php

namespace App\Http\Controllers;

//import model obat
use App\Models\Obat; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {

        //get all obat
        $obats = Obat::latest()->paginate(10);

        //render view with obat
        return view('obats.index', compact('obats'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('obats.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_obat'     => 'required|min:3',
            'kategori'      => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
            'expired_at'    => 'required|date_format:Y-m-d',
        ]);

        //create obat
        Obat::create([
            'nama_obat'     => $request->nama_obat,
            'kategori'      => $request->kategori,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock,
            'expired_at'    => $request->expired_at,
        ]);

        //redirect to index
        return redirect()->route('obats.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get obat by ID
        $obat = Obat::findOrFail($id);

        //render view with obat
        return view('obats.show', compact('obat'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get obat by ID
        $obat = Obat::findOrFail($id);

        //render view with obat
        return view('obats.edit', compact('obat'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {

        //validate form
        $request->validate([
           'nama_obat'      => 'required|min:3',
            'kategori'      => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
            'expired_at'    => 'required|date_format:Y-m-d',
        ]);

        //get obat by ID
        $obat = Obat::findOrFail($id);

            //update obat 
            $obat->update([
            'nama_obat'     => $request->nama_obat,
            'kategori'      => $request->kategori,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock,
            'expired_at'    => $request->expired_at,
            ]);

        //redirect to index
        return redirect()->route('obats.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get obat by ID
        $obat = Obat::findOrFail($id);

        //delete obat
        $obat->delete();

        //redirect to index
        return redirect()->route('obats.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}