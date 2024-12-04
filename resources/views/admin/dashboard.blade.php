@extends('layouts.admin-dashboard')

@section('content')

    <h1 class="text-lg font-bold mb-10">{{ __('Dashboard') }}</h1>

    <h3 class="font-bold text-cyan-600">
        <a href="{{ route('admin.users-list.index') }}">
            ユーザー一覧を表示
        </a>
    </h3>


@endsection