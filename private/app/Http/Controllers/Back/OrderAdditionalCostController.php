<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderAdditionalCost;
use App\Models\AdditionalCost;

class OrderAdditionalCostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

//    public function index(Request $request, $id) {
//        $orders = OrderAdditionalCost::orderBy('id', 'desc');
//        $orders = $orders->where('order_id', $id);
//        // search
//        
//        // paginate
//        if ($request->input('view')) {
//            $view = $request->input('view');
//        } else {
//            $view = 20;
//        }
//       
//        $total = $orders->count();
//        $orders = $orders->paginate($view);
//        $order = $id;
//        $pagetitle = 'Order Vendor';
//       
//        return view('order-additional-cost.index', compact('orders', 'total', 'pagetitle', 'view', 'order'));
//       
//    }

    public function create(Request $request) {
        $order = new OrderAdditionalCost;
        $order->order_id = $request->input('order');
        $order->type = $request->input('type');
        $additionals = AdditionalCost::orderBy('additional_costs.id');
        $additionals = $additionals->join('companies', 'companies.id', '=', 'additional_costs.company_id');
        $additionals = $additionals->where('type', $order->type);
        $additionals = $additionals->lists('additional_costs.name', 'additional_costs.id');
        $pagetitle = 'Service';
        return view('order-additional-cost.create', compact('order', 'pagetitle', 'additionals'));
    }

    public function store(Request $request) {
        $vendororder = new OrderAdditionalCost();

        $validator = $vendororder->validate($request->all());

        if ($validator->fails()) {
            return redirect('order_vendor_shipping/create?order=' . $request->input('order_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $vendororder->create($data);
        if ($data['type'] == 3)
            return redirect()->route('order_vendor_shipping.index', ['id' => $data['order_id']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
        else
            return redirect()->route('order_vendor.index', ['id' => $data['order_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit(Request $request, $id) {
        $order = OrderAdditionalCost::findOrFail($id);
        $additionals = AdditionalCost::orderBy('additional_costs.id');
        $additionals = $additionals->join('companies', 'companies.id', '=', 'additional_costs.company_id');
        $additionals = $additionals->where('type', $order->type);
        $additionals = $additionals->lists('additional_costs.name', 'additional_costs.id');
        $pagetitle = 'Order Vendor';
        return view('order-additional-cost.edit', compact('order', 'pagetitle', 'additionals'));
    }

    public function update(Request $request, $id) {
        $vendororder = OrderAdditionalCost::findOrFail($id);
        $validator = $vendororder->validate($request->all(), false);
        if ($validator->fails()) {
            return redirect('order_vendor_shipping/' . $id . '/edit?order=' . $request->input('order_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $vendororder->update($data);
        if ($data['type'] == 3)
            return redirect()->route('order_vendor_shipping.index', ['id' => $data['order_id']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
        else
            return redirect()->route('order_vendor.index', ['id' => $data['order_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy(Request $request, $id) {
        $vendororder = OrderAdditionalCost::findOrFail($id);
        $order = $vendororder->order_id;
        $type = $vendororder->type;
        $vendororder->delete();
        if ($type == 2)
            return redirect()->route('order_vendor_shipping.index', ['id' => $data['order_id']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
        else
            return redirect()->route('order_vendor.index', ['id' => $order, 'type' => $type])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

}