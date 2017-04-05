<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $companies = Company::orderBy('id', 'desc');
        $companies = $companies->where('type', 1);
        // search
        if ($request->input('nama')) {
            $companies = $companies->where('nama', 'like', '%' . $request->input('nama') . '%');
            $nama = $request->input('nama');
        } else {
            $nama = '';
        }

        // paginate
        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }
        $total = $companies->count();
        $companies = $companies->paginate($view);
        $type = 1;
        $pagetitle = 'Company';
        return view('company.index', compact('companies', 'total', 'pagetitle', 'view', 'nama', 'type'));
    }

    public function index_trucking(Request $request) {
        $companies = Company::orderBy('id', 'desc');
        $companies = $companies->where('type', 2);
        // search
        if ($request->input('nama')) {
            $companies = $companies->where('nama', 'like', '%' . $request->input('nama') . '%');
            $nama = $request->input('nama');
        } else {
            $nama = '';
        }

        // paginate
        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }
        $total = $companies->count();
        $companies = $companies->paginate($view);
        $type = 2;
        $pagetitle = 'Vendor Trucking';
        return view('company.index', compact('companies', 'total', 'pagetitle', 'view', 'nama', 'type'));
    }

    public function index_shipping(Request $request) {
        $companies = Company::orderBy('id', 'desc');
        $companies = $companies->where('type', 3);
        // search
        if ($request->input('nama')) {
            $companies = $companies->where('nama', 'like', '%' . $request->input('nama') . '%');
            $nama = $request->input('nama');
        } else {
            $nama = '';
        }

        // paginate
        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }
        $total = $companies->count();
        $companies = $companies->paginate($view);
        $type = 3;
        $pagetitle = 'Vendor Shipping';
        return view('company.index', compact('companies', 'total', 'pagetitle', 'view', 'nama', 'type'));
    }
    
    public function index_dooring(Request $request) {
        $companies = Company::orderBy('id', 'desc');
        $companies = $companies->where('type', 4);
        // search
        if ($request->input('nama')) {
            $companies = $companies->where('nama', 'like', '%' . $request->input('nama') . '%');
            $nama = $request->input('nama');
        } else {
            $nama = '';
        }

        // paginate
        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }
        $total = $companies->count();
        $companies = $companies->paginate($view);
        $type = 4;
        $pagetitle = 'Vendor Dooring';
        return view('company.index', compact('companies', 'total', 'pagetitle', 'view', 'nama', 'type'));
    }

    public function create(Request $request) {
        $company = new Company;
        $company->type = $request->input('type');
        $pagetitle = 'Company';
        return view('company.create', compact('company', 'pagetitle'));
    }

    public function store(Request $request) {
        $company = new Company();

        $validator = $company->validate($request->all());

        if ($validator->fails()) {
            return redirect('company/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $company->create($data);
        if ($company->type == 1) {
            return redirect()->route('company.index')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        } else if ($company->type == 2) {
            return redirect()->route('company.index_trucking')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        } else if ($company->type == 3){
            return redirect()->route('company.index_shipping')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        } else {
            return redirect()->route('company.index_dooring')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        }
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit($id) {
        $company = Company::findOrFail($id);
        $pagetitle = 'Company';
        return view('company.edit', compact('company', 'pagetitle'));
    }

    public function update(Request $request, $id) {
        $company = Company::findOrFail($id);

        $validator = $company->validate($request->all(), false);

        if ($validator->fails()) {
            return redirect('company/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $company->update($data);

        if ($company->type == 1) {
            return redirect()->route('company.index')->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
        } else if ($company->type == 2) {
            return redirect()->route('company.index_trucking')->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
        } else if ($company->type == 3){
            return redirect()->route('company.index_shipping')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        } else {
            return redirect()->route('company.index_dooring')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        }
    }

    public function destroy($id) {
        $company = Company::findOrFail($id);
        $type = $company->type;
        $company->delete();

        if ($type == 1) {
            return redirect()->route('company.index')->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
        } else if ($type == 2) {
            return redirect()->route('company.index_trucking')->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
        } else if ($company->type == 3){
            return redirect()->route('company.index_shipping')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        } else {
            return redirect()->route('company.index_dooring')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
        }
    }

}