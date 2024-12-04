@extends('layouts.owner-dashboard')

@section('content')
    <h1 class="text-lg font-bold mb-10">{{ __('Dashboard') }}</h1>

    <div class="mb-16">
        <h3 class="font-bold mb-5">
            管理者
        </h3>
        <ul class="text-sky-600">
            <li class="m-3">
                <a href="{{ route('owner.admins-list.index') }}">
                    管理者一覧
                </a>
            </li>
            <li class="m-3">
                <a href="{{ route('owner.admins-list.create') }}">
                    新規登録
                </a>
            </li>
        </ul>
    </div>

    <div class="mb-16">
        <h3 class="font-bold mb-5">
            ユーザー
        </h3>
        <ul class="text-sky-600">
            <li class="m-3">
                <a href="{{ route('owner.users-list.index') }}">
                    ユーザー一覧
                </a>
            </li>
            <li class="m-3">
                <a href="{{ route('owner.users-list.create') }}">
                    新規登録
                </a>
            </li>
        </ul>
    </div>
    
@endsection
