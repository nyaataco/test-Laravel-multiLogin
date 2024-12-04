<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Requests\Owner\StoreAdminRequest;
use App\Http\Requests\Owner\UpdateAdminRequest;
use App\Http\Requests\Owner\UpdateAdminPasswordRequest;

class AdminsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ownerName = Auth::guard('owners')->user()->name;
        
        $admins = Admin::paginate(20);
        return view('owner.admins-list.index', compact('ownerName', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ownerName = Auth::guard('owners')->user()->name;

        return view('owner.admins-list.create', compact('ownerName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = new Admin();
        $admin->admin_id = $request->input('admin_id');
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->save();

        return redirect()->route('owner.admins-list.index')->with('flash_message', '新規管理者を登録しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $admin = Admin::where('admin_id', $id)->first();
        if (!$admin) {
            return redirect()->route('owner.admins-list.index')->with('error_message', '管理者が見つかりませんでした。');
        }

        return view('owner.admins-list.show', compact('ownerName', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Admin $admin)
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $admin = Admin::where('admin_id', $id)->first();
        if (!$admin) {
            return redirect()->route('owner.admins-list.index')->with('error_message', '管理者が見つかりませんでした。');
        }

        $adminData = $admin->only(['admin_id', 'name', 'email']);

        return view('owner.admins-list.edit', compact('ownerName', 'adminData'));
    }


    public function editPwd(string $id, Admin $admin)
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $admin = Admin::where('admin_id', $id)->first();
        if (!$admin) {
            return redirect()->route('owner.admins-list.index')->with('error_message', '管理者が見つかりませんでした。');
        }

        $admin_id = $admin->admin_id;

        return view('owner.admins-list.edit-pwd', compact('ownerName', 'admin_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, string $id)
    {
        $admin = Admin::where('admin_id', $id)->first();

        $admin->admin_id = $request->input('admin_id');
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();

        return redirect()->route('owner.admins-list.show', ['id' => $admin->admin_id])->with('flash_message', '管理者情報を変更しました。');
    }

    public function updatePwd(UpdateAdminPasswordRequest $request, string $id)
    {
        $admin = Admin::where('admin_id', $id)->first();

        $admin->password = $request->input('password');
        $admin->save();

        return redirect()->route('owner.admins-list.show', ['id' => $admin->admin_id])->with('flash_message', 'パスワードを変更しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::where('admin_id', $id)->first();
        $admin->delete();

        return redirect()->route('owner.admins-list.index')->with('flash_message', '管理者を削除しました。');
    }


    public function showDeleted()
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $deletedAdmins = Admin::onlyTrashed()->get();

        return view('owner.admins-list.deleted', compact('ownerName', 'deletedAdmins'));
    }


    public function restoreDeleted(string $id)
    {
        $admin = Admin::withTrashed()->find($id);

        $admin->restore();

        return redirect()->route('owner.admins-list.index')->with('flash_message', '管理者を復元しました。');
    }

}
