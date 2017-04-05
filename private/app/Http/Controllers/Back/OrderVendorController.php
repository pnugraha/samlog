<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderVendor;
use App\Models\Service;
use App\Models\AdditionalCost;
use DB;

class OrderVendorController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $orders = OrderVendor::orderBy('id', 'desc');
        $orders = $orders->where('order_id', $id);
        $additionals = AdditionalCost::orderBy('additional_costs.id');
        $additionals = $additionals->join('companies', 'companies.id', '=', 'additional_costs.company_id');
        // search
        
        // paginate
        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }
        $order = $id;
        $type = $request->input('type');    
        $orders = $orders->where('type', $type);        
        $total = $orders->count();
        $orders = $orders->get();     
        $additionals = $additionals->where('type', $type);
        $additionals = $additionals->select('additional_costs.*')->get();  
      
        $pagetitle = 'Order Vendor';
       
        return view('order-vendor.index', compact('orders', 'additionals', 'total', 'pagetitle', 'view', 'order', 'type'));
       
    }

    public function create(Request $request) {
        $order = new OrderVendor;
        $order->order_id = $request->input('order');    
        $order->type = $request->input('type');    
        $services = Service::where('type', $order->type)->orderBy('companies.name');
        $services = $services->join('companies', 'companies.id', '=', 'services.company_id');
        $services = $services->select(DB::raw('concat(`name`, " : ", `pick_up`, " - ", delivery) as list'), 'services.id as id')->lists('list', 'id');
        $pagetitle = 'Order Vendor';
        return view('order-vendor.create', compact('order', 'pagetitle', 'services'));
    }

    public function store(Request $request) {
        $vendororder = new OrderVendor();

        $validator = $vendororder->validate($request->all());
        if ($validator->fails()) {
            return redirect('order_vendor/create?order=' . $request->input('order_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $vendororder->create($data);
        return redirect()->route('order_vendor.index', ['id' => $data['order_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit(Request $request, $id) {
        $order = OrderVendor::findOrFail($id);
        $services = Service::where('type', $order->type)->orderBy('companies.name');
        $services = $services->join('companies', 'companies.id', '=', 'services.company_id');
        $services = $services->select(DB::raw('concat(`name`, " : ", `pick_up`, " - ", delivery) as list'), 'services.id as id')->lists('list', 'id');
        $pagetitle = 'Order Vendor';
        return view('order-vendor.edit', compact('order', 'pagetitle', 'services'));
    }

    public function update(Request $request, $id) {
        $vendororder = OrderVendor::findOrFail($id);
        $validator = $vendororder->validate($request->all(), false);
        if ($validator->fails()) {
            return redirect('order_vendor/' . $id . '/edit?order=' . $request->input('order_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $vendororder->update($data);

        return redirect()->route('order_vendor.index', ['id' => $data['order_id'], 'type' => $data['type']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy(Request $request, $id) {
        $vendororder = OrderVendor::findOrFail($id);
        $order = $vendororder->order_id;
        $type = $vendororder->type;
        $vendororder->delete();
        return redirect()->route('order_vendor.index', ['id' => $order, 'type' => $type])->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
    }

}