<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Company;
use App\Models\Service;
use DB;

class OrderController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $orders = Order::orderBy('id', 'desc');
        // search
        if ($request->input('no')) {
            $orders = $orders->where('no', 'like', '%' . $request->input('no') . '%');
            $no = $request->input('no');
        } else {
            $no = '';
        }

        // paginate
        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }
        $total = $orders->count();
        $orders = $orders->paginate($view);
        $pagetitle = 'Order';
        return view('order.index', compact('orders', 'total', 'pagetitle', 'view', 'no'));
    }

    public function create(Request $request) {
        $order = new Order;
        $customers = Company::where('type', 1)->orderBy('name')->lists('name', 'id');
        $services = Service::where('type', 1)->orderBy('companies.name');
        $services = $services->join('companies', 'companies.id', '=', 'services.company_id');
        $services = $services->select(DB::raw('concat(`name`, " : ", `pick_up`, " - ", delivery) as list'), 'services.id as id')->lists('list', 'id');
        $pagetitle = 'Order';
        return view('order.create', compact('order', 'pagetitle', 'customers', 'services'));
    }

    public function store(Request $request) {
        $order = new Order();

        $validator = $order->validate($request->all());
//        dd($validator);
        if ($validator->fails()) {
            return redirect('order/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $order->create($data);

        return redirect()->route('order.index')->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit($id) {
        $order = Order::findOrFail($id);
        $customers = Company::where('type', 1)->orderBy('name')->lists('name', 'id');
        $services = Service::where('type', 1)->orderBy('companies.name');
        $services = $services->join('companies', 'companies.id', '=', 'services.company_id');
        $services = $services->select(DB::raw('concat(`name`, " : ", `pick_up`, " - ", delivery) as list'), 'services.id as id')->lists('list', 'id');
        $pagetitle = 'Order';
        return view('order.edit', compact('order', 'pagetitle', 'customers', 'services'));
    }

    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);

        $validator = $order->validate($request->all(), false);

        if ($validator->fails()) {
            return redirect('order/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $data['stuffing_date'] = conv_tanggal($data['stuffing_date']);
        $order->update($data);

        return redirect()->route('order.index')->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy($id) {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.index')->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
    }

}