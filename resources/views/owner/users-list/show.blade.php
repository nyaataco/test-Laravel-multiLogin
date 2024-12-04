@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10 lg:w-4/5 mx-auto">ユーザー情報 詳細</h1>

<div class="mid:w-10/12 lg:w-4/5 mx-auto mb-10">
    @if (session('flash_message'))
        <p class="text-red-600 font-bold mb-5">{{ session('flash_message') }}</p>
    @endif
    
    <div class="mb-10">
        
        <div>
            ユーザーID : 
            {{ $user->user_id }}
        </div>
        
        <div>
            名前 : 
            {{ $user->name }}
        </div> 

        <div>
            メールアドレス : 
            {{ $user->email }} 
        </div>

        <div>
            メールアドレス認証 : 
            {{ $user->email_verified_at ? '認証済み' : '認証されていません' }}
        </div>

        <div>
            パスワード : 
            非表示
        </div>
        
        <div>
            登録日 : 
            {{ $user->created_at }} 
        </div>
         
        <div>
            更新日 : 
            {{ $user->updated_at }}
        </div>
        
    </div>

    <div>
        <div class="mb-10 space-x-5 ">
            <a href="{{ route('owner.users-list.edit', ['id' => $user->user_id]) }}" class="bg-cyan-600 text-white text-bold p-2 rounded">
                ユーザー情報編集
            </a>

            <a href="{{ route('owner.users-list.edit-pwd', ['id' => $user->user_id]) }}" class="bg-cyan-600 text-white text-bold p-2 rounded">
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
                        <form action="{{ route('owner.users-list.destroy', ['id' => $user->user_id]) }}" method="POST">
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

        <a href="{{ route('owner.users-list.index') }}" class="text-sky-600">
            ユーザー一覧に戻る
        </a>
    </div>

</div>


@endsection