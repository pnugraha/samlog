<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalCost;

class AdditionalCostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $costs = AdditionalCost::orderBy('id', 'desc');
        $costs = $costs->where('company_id', $id);
        // search
        if ($request->input('nama')) {
            $costs = $costs->where('name', 'like', '%' . $request->input('nama') . '%');
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
        $total = $costs->count();
        $costs = $costs->paginate($view);
        $company = $id;
        $type = $request->input('type');
        $pagetitle = 'Additional Cost';
        return view('additional-cost.index', compact('costs', 'total', 'pagetitle', 'view', 'nama', 'company', 'type'));
    }

    public function create(Request $request) {
        $cost = new AdditionalCost;
        $cost->company_id = $request->input('company');
        $type = $request->input('type');
        $pagetitle = 'Additional Cost';
        return view('additional-cost.create', compact('cost', 'pagetitle', 'type'));
    }

    public function store(Request $request) {
        $cost = new AdditionalCost();

        $validator = $cost->validate($request->all());

        if ($validator->fails()) {
            return redirect('additional_cost/create?company='.$request->input('company_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $data['tarif'] = conv_angka($data['tarif']);
        $cost->create($data);

        return redirect()->route('additional_cost.index', ['id' => $data['company_id'], 'type' => $data['type'] ])->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit($id) {
        $cost = AdditionalCost::findOrFail($id);
        $type = $cost->type;
        $pagetitle = 'Additional Cost';
        return view('additional-cost.edit', compact('cost', 'pagetitle', 'type'));
    }

    public function update(Request $request, $id) {
        $cost = AdditionalCost::findOrFail($id);

        $validator = $cost->validate($request->all(), false);

        if ($validator->fails()) {
            return redirect('additional_cost/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $data['tarif'] = conv_angka($data['tarif']);
        $cost->update($data);

        return redirect()->route('additional_cost.index', ['id' => $data['company_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy(Request $request, $id) {
        $cost = AdditionalCost::findOrFail($id);
        $company = $cost->company_id;
        $type = $request->input('type');
        $cost->delete();
        return redirect()->route('additional_cost.index', ['id' => $company, 'type' => $type])->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
    }

}