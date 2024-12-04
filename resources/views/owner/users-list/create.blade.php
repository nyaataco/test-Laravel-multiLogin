@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10 lg:w-4/5 mx-auto">ユーザー 新規登録</h1>

<div class="mid:w-10/12 lg:w-4/5 mx-auto mb-10">

    <form method="post" action="{{ route('owner.users-list.store') }}" class="space-y-10">
        @csrf

        <div>
            <label for="user_id" class="block">ユーザーID</label>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            <input type="number" name="user_id" id="user_id" value="{{ old('user_id') }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="name" class="block">名前</label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="email" class="block">メールアドレス</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="password" class="block">パスワード</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <input type="password" name="password" id="password" value="{{ old('password') }}" class="w-full lg:w-10/12">
        </div>

        
        <div>
            <label for="password_confirmation" class="block">パスワード確認</label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full lg:w-10/12">
        </div>

        <x-primary-button class="bg-lime-700">
            送信する
        </x-primary-button>
        
    </form>

</div>




@endsection