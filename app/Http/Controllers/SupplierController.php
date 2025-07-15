<?php

namespace App\Http\Controllers;

//import model Supplier
use App\Models\Supplier; 

//import return type View
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all Suppliers
        $suppliers = Supplier::latest()->paginate(10);

        //render view with Suppliers
        return view('suppliers.index', compact('suppliers'));
    }
}