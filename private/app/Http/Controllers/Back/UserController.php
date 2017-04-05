<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Sekar\UserLevel;
use App\Models\Sekar\Pegawai as Pegawai_Sekar;
use App\Models\Master\PegawaiMaster as Pegawai_Master;
use App\Models\Sekar\PegawaiTemp;
use Illuminate\Http\Request;
use Crypt;
use DB;
use \DateTime;
use Illuminate\Support\Facades\File;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->user = \Auth::user();
    }

    public function index(Request $request) {
        $users = User::orderBy('username');

        if ($request->input('view')) {
            $view = $request->input('view');
        } else {
            $view = 20;
        }

        if ($request->input('cari')) {
            $users = $users->where(function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->input('cari') . '%')
                                ->Orwhere('username', 'like', '%' . $request->input('cari') . '%');
                    });
            $cari = $request->input('cari');
        } else {
            $cari = '';
        }


        $users = $users->select('users.*', 'users.id as id');
        $total = $users->count();
        $users = $users->paginate($view);
        $pagetitle = 'User';

        return view('user.index', compact('users', 'total', 'view', 'cari', 'pagetitle'));
    }

    public function create() {
        $user = new User();
        $pagetitle = 'User';
        return view('user.create', compact('user', 'pagetitle'));
    }

    public function store(Request $request) {
        $user = new User();        
        $validator = $user->validate($request->all());
        
        if ($validator->fails()) { //dd($validator);
            return redirect('user/create')
                            ->withErrors($validator)                           
                            ->withInput();
        }

        // saving
        $data = $request->all();       
        $data['password'] = bcrypt($request->input('password'));
        $user->create($data);    
        return redirect()->route('user.index')->with(['message' => 'Data berhasil ditambahkan.', 'type' => 'success']);
    }

    public function show($id) {
        $user = User::findOrFail($id); 
        $pagetitle = 'User';
        return view('users.show', compact('user', $pegawai, 'pagetitle'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $pagetitle = 'User';
        return view('user.edit', compact('user', 'pagetitle'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $validator = $user->validate($request->all(), false);
        if ($validator->fails()) {
            return redirect('user/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }

        $request->offsetSet('password', bcrypt($request->offsetGet('password')));
        $data = $request->all();
        $user->update($data);

        return redirect()->route('user.index')->with(['message' => 'Data berhasil diubah.', 'type' => 'success']);
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'Data berhasil dihapus.', 'type' => 'success']);
    }

}