@extends('layouts.owner-dashboard')

@section('content')

<?php
// dd($admin);
?>

<h1 class="text-lg font-bold mb-10 lg:w-4/5 mx-auto">管理者情報 編集</h1>

<div class="mid:w-10/12 lg:w-4/5 mx-auto mb-10">

    <form method="post" action="{{ route('owner.admins-list.update', ['id' => $adminData['admin_id']]) }}" class="space-y-10 mb-10">
        @csrf
        @method('patch')

        <div>
            <label for="admin_id" class="block">管理者ID</label>
            <x-input-error :messages="$errors->get('admin_id')" class="mt-2" />
            <input type="number" name="admin_id" id="admin_id" value="{{ old('admin_id', $adminData['admin_id']) }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="name" class="block">名前</label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input type="text" name="name" id="name" value="{{ old('name', $adminData['name']) }}" class="w-full lg:w-10/12">
        </div>

        <div>
            <label for="email" class="block">メールアドレス</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <input type="email" name="email" id="email" value="{{ old('email', $adminData['email']) }}" class="w-full lg:w-10/12">
        </div>

        <x-primary-button class="bg-lime-700">
            送信する
        </x-primary-button>
        
    </form>

    <a href="{{ route('owner.admins-list.show', ['id' => $adminData['admin_id']]) }}" class="text-sky-600">
        戻る
    </a>

</div>

@endsection