@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10 lg:w-4/5 mx-auto">ユーザー情報 編集</h1>

<div class="mid:w-10/12 lg:w-4/5 mx-auto mb-10">

    <form method="post" action="{{ route('owner.users-list.update', ['id' => $userData['user_id']]) }}" class="space-y-10 mb-10">
        @csrf
        @method('patch')

        <div>
            <label for="user_id" class="block">ユーザーID</label>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            <input type="number" name="user_id" id="user_id" value="{{ old('user_id', $userData['user_id']) }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="name" class="block">名前</label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input type="text" name="name" id="name" value="{{ old('name', $userData['name']) }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="email" class="block">メールアドレス</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <input type="email" name="email" id="email" value="{{ old('email', $userData['email']) }}" class="w-full lg:w-10/12">
        </div>

        <x-primary-button class="bg-cyan-700">
            送信する
        </x-primary-button>
        
    </form>

    <a href="{{ route('owner.users-list.show', ['id' => $userData['user_id']]) }}" class="text-sky-600">
        戻る
    </a>

</div>

@endsection