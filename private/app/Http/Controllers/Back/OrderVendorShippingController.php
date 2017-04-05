<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderVendorShipping;
use App\Models\Service;
use App\Models\AdditionalCost;
use DB;

class OrderVendorShippingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $orders = OrderVendorShipping::orderBy('id', 'desc');
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
       
        $total = $orders->count();
        $orders = $orders->get();
        $order = $id;
        $type = 3;    
        $additionals = $additionals->where('type', 3);
        $additionals = $additionals->select('additional_costs.*')->get();  
        $pagetitle = 'Order Vendor';
       
        return view('order-vendor-shippng.index', compact('orders', 'total', 'pagetitle', 'view', 'order', 'additionals', 'type'));
       
    }

    public function create(Request $request) {
        $order = new OrderVendorShipping;
        $order->order_id = $request->input('order');    
        $services = Service::where('type', 3)->orderBy('companies.name');
        $services = $services->join('companies', 'companies.id', '=', 'services.company_id');
        $services = $services->select(DB::raw('concat(`name`, " : ", `pol`, " - ", pod) as list'), 'services.id as id')->lists('list', 'id');
        $pagetitle = 'Service';
        return view('order-vendor-shippng.create', compact('order', 'pagetitle', 'services'));
    }

    public function store(Request $request) {
        $vendororder = new OrderVendorShipping();

        $validator = $vendororder->validate($request->all());

        if ($validator->fails()) {
            return redirect('order_vendor_shipping/create?order=' . $request->input('order_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $data['bl_fee'] = conv_angka($data['bl_fee']);
        $data['closing_date'] = conv_tanggal($data['closing_date']);
        $data['etd_pol'] = conv_tanggal($data['etd_pol']);
        $data['etd_pod'] = conv_tanggal($data['etd_pod']);
        $vendororder->create($data);
        return redirect()->route('order_vendor_shipping.index', ['id' => $data['order_id']])->with(['message' => 'Data berhasil ditambah.', 'type' => 'success']);
    }

    public function show($id) {
        return view('cuti.show');
    }

    public function edit(Request $request, $id) {
        $order = OrderVendorShipping::findOrFail($id);
        $services = Service::where('type', 3)->orderBy('companies.name');
        $services = $services->join('companies', 'companies.id', '=', 'services.company_id');
        $services = $services->select(DB::raw('concat(`name`, " : ", `pol`, " - ", pod) as list'), 'services.id as id')->lists('list', 'id');
        $pagetitle = 'Order Vendor';
        return view('order-vendor-shippng.edit', compact('order', 'pagetitle', 'services'));
    }

    public function update(Request $request, $id) {
        $vendororder = OrderVendorShipping::findOrFail($id);
        $validator = $vendororder->validate($request->all(), false);
        if ($validator->fails()) {
            return redirect('order_vendor_shipping/' . $id . '/edit?order=' . $request->input('order_id'))
                            ->withErrors($validator)
                            ->withInput();
        }

        $data = $request->all();
        $data['bl_fee'] = conv_angka($data['bl_fee']);
        $data['closing_date'] = conv_tanggal($data['closing_date']);
        $data['etd_pol'] = conv_tanggal($data['etd_pol']);
        $data['etd_pod'] = conv_tanggal($data['etd_pod']);
        $vendororder->update($data);

        return redirect()->route('order_vendor_shipping.index', ['id' => $data['order_id']])->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy(Request $request, $id) {
        $vendororder = OrderVendorShipping::findOrFail($id);
        $order = $vendororder->order_id;
        $vendororder->delete();
        return redirect()->route('order_vendor_shipping.index', ['id' => $order, ])->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
    }

}