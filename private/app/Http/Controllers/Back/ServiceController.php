<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $services = Service::orderBy('id', 'desc');
        $services = $services->where('company_id', $id);
        // search
        if ($request->input('nama')) {
            $services = $services->where('pick_up', 'like', '%' . $request->input('nama') . '%');
            $services = $services->where(function ($query) use ($request) {
                        $query->where('pick_up', 'like', '%' . $request->input('nama') . '%')
                                ->Orwhere('delivery', 'like', '%' . $request->input('nama') . '%')
                                ->Orwhere('pol', 'like', '%' . $request->input('nama') . '%')
                                ->Orwhere('pod', 'like', '%' . $request->input('nama') . '%');
                    });
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

        if ($request->input('type')) {
            $type = $request->input('type');
        } else {
            $type = 1;
        }
        $total = $services->count();
        $services = $services->paginate($view);
        $company = $id;
        $pagetitle = 'Service';
        if ($type == 1)
            return view('service.index', compact('services', 'total', 'pagetitle', 'view', 'nama', 'company', 'type'));
        else if ($type == 2 || $type == 4)
            return view('service.index_trucking', compact('services', 'total', 'pagetitle', 'view', 'nama', 'company', 'type'));
        else
            return view('service.index_shipping', compact('services', 'total', 'pagetitle', 'view', 'nama', 'company', 'type'));
    }

    public function create(Request $request) {
        $service = new Service;
        $service->company_id = $request->input('company');
        if ($request->input('type')) {
            $type = $request->input('type');
        } else {
            $type = 1;
        }
        $pagetitle = 'Service';
        return view('service.create', compact('service', 'pagetitle', 'type'));
    }

    public function store(Request $request) {
        $service = new Service();

        $validator = $service->validate($request->all());

        if ($validator->fails()) {
            return redirect('service/create?company=' . $request->input('company_id') . '&type=' . $request->input('type'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();

        $service->create($data);

        return redirect()->route('service.index', ['id' => $data['company_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit(Request $request, $id) {
        $service = Service::findOrFail($id);
        if ($request->input('type')) {
            $type = $request->input('type');
        } else {
            $type = 1;
        }
        $pagetitle = 'Service';
        return view('service.edit', compact('service', 'pagetitle', 'type'));
    }

    public function update(Request $request, $id) {
        $service = Service::findOrFail($id);

        $validator = $service->validate($request->all(), false);

        if ($validator->fails()) {
            return redirect('service/' . $id . '/edit?company=' . $request->input('company_id') . '&type=' . $request->input('type'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $service->update($data);

        return redirect()->route('service.index', ['id' => $data['company_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy(Request $request, $id) {
        $service = Service::findOrFail($id);
        $company = $service->company_id;
        if ($request->input('type')) {
            $type = $request->input('type');
        } else {
            $type = 1;
        }
        $service->delete();
        return redirect()->route('service.index', ['id' => $company, 'type' => $data['type']])->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
    }

}