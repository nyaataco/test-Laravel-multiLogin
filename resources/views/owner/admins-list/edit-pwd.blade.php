@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10 lg:w-4/5 mx-auto">パスワードの変更</h1>

<div class="mid:w-10/12 lg:w-4/5 mx-auto mb-10">

    <form method="post" action="{{ route('owner.admins-list.update-pwd', ['id' => $admin_id]) }}" class="space-y-10 mb-10">
        @csrf
        @method('patch')

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

    <a href="{{ route('owner.admins-list.show', ['id' => $admin_id]) }}" class="text-sky-600">
        戻る
    </a>

</div>


@endsection