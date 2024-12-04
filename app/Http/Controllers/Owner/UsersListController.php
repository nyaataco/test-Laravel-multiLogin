<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Owner\StoreUserRequest;
use App\Http\Requests\Owner\UpdateUserRequest;
use App\Http\Requests\Owner\UpdateUserPasswordRequest;

class UsersListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ownerName = Auth::guard('owners')->user()->name;
        
        $users = User::paginate(20);
        return view('owner.users-list.index', compact('ownerName', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ownerName = Auth::guard('owners')->user()->name;
        
        return view('owner.users-list.create', compact('ownerName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $post = new User();
        $post->user_id = $request->input('user_id');
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->password = $request->input('password');
        $post->save();

        return redirect()->route('owner.users-list.index')->with('flash_message', '新規ユーザーを登録しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $user = User::where('user_id', $id)->first();
        if (!$user) {
            return redirect()->route('owner.users-list.index')->with('error_message', '管理者が見つかりませんでした。');
        }

        return view('owner.users-list.show', compact('ownerName', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, User $user)
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $user = User::where('user_id', $id)->first();
        if (!$user) {
            return redirect()->route('owner.users-list.index')->with('error_message', '管理者が見つかりませんでした。');
        }

        $userData = $user->only(['user_id', 'name', 'email']);

        return view('owner.users-list.edit', compact('ownerName', 'userData'));
    }


    public function editPwd(string $id, User $user)
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $user = User::where('user_id', $id)->first();
        if (!$user) {
            return redirect()->route('owner.users-list.index')->with('error_message', '管理者が見つかりませんでした。');
        }

        $user_id = $user->user_id;

        return view('owner.users-list.edit-pwd', compact('ownerName', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::where('user_id', $id)->first();

        $user->user_id = $request->input('user_id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('owner.users-list.show', ['id' => $user->user_id])->with('flash_message', 'ユーザー情報を変更しました。');
    }

    public function updatePwd(UpdateUserPasswordRequest $request, string $id)
    {
        $user = User::where('user_id', $id)->first();

        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('owner.users-list.show', ['id' => $user->user_id])->with('flash_message', 'パスワードを変更しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('user_id', $id)->first();
        $user->delete();

        return redirect()->route('owner.users-list.index')->with('flash_message', 'ユーザーを削除しました。');
    }


    public function showDeleted()
    {
        $ownerName = Auth::guard('owners')->user()->name;

        $deletedUsers = User::onlyTrashed()->get();

        return view('owner.users-list.deleted', compact('ownerName', 'deletedUsers'));
    }


    public function restoreDeleted(string $id)
    {
        $user = User::withTrashed()->find($id);

        $user->restore();

        return redirect()->route('owner.users-list.index')->with('flash_message', 'ユーザーを復元しました。');
    }

}
