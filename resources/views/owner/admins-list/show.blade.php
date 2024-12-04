@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10 lg:w-4/5 mx-auto">管理者情報 詳細</h1>

<div class="mid:w-10/12 lg:w-4/5 mx-auto mb-10">
    @if (session('flash_message'))
        <p class="text-red-600 font-bold mb-5">{{ session('flash_message') }}</p>
    @endif
    
    <div class="mb-10">
        
        <div>
            管理者ID : 
            {{ $admin->admin_id }}
        </div>
        
        <div>
            名前 : 
            {{ $admin->name }}
        </div> 

        <div>
            メールアドレス : 
            {{ $admin->email }} 
        </div>

        <div>
            メールアドレス認証 : 
            {{ $admin->email_verified_at ? '認証済み' : '認証されていません' }}
        </div>

        <div>
            パスワード : 
            非表示
        </div>
        
        <div>
            登録日 : 
            {{ $admin->created_at }} 
        </div>
         
        <div>
            更新日 : 
            {{ $admin->updated_at }}
        </div>
        
    </div>

    <div>
        <div class="mb-10 space-x-5 flex">
            <a href="{{ route('owner.admins-list.edit', ['id' => $admin->admin_id]) }}" class="bg-lime-600 text-white text-bold p-2 rounded">
                管理者情報編集
            </a>

            <a href="{{ route('owner.admins-list.edit-pwd', ['id' => $admin->admin_id]) }}" class="bg-lime-600 text-white text-bold p-2 rounded">
                パスワードの変更
            </a>
            
            <a href="#" onclick="toggleModal('deleteUserConfirmModal')" class="bg-gray-200 text-black text-bold p-2 rounded">
                削除
            </a>

            <div id="deleteUserConfirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white overflow-hidden shadow-xl transform transition-all rounded-lg w-2/5">
                    <div class="m-10">
                        <h3 class="text-bold text-gray-900">本当に削除しますか？</h3>
                    </div>
                    <div class="m-10 flex">
                        <form action="{{ route('owner.admins-list.destroy', ['id' => $admin->admin_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-3 rounded-md mr-6">
                                削除
                            </button>
                        </form>
                        <button type="button" onclick="toggleModal('deleteUserConfirmModal')" class="bg-gray-200 text-black py-2 px-3 rounded-md">
                            キャンセル
                        </button>
                    </div>
                </div>
            </div>
            
        </div>

        <a href="{{ route('owner.admins-list.index') }}" class="text-sky-600">
            管理者一覧に戻る
        </a>
    </div>

</div>


@endsection