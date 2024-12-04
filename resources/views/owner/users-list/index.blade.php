@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10">ユーザー一覧</h1>

    @if (session('flash_message'))
        <p class="text-red-600 font-bold mb-10">{{ session('flash_message') }}</p>
    @endif

    <div class="mb-10 text-sky-600">
        <a href="{{ route('owner.users-list.create') }}" class="mr-5">
            新規登録
        </a>

        <a href="{{ route('owner.users-list.deleted') }}">
            削除済みデータ
        </a>
    </div>

    <div class="flex justify-center mb-14">
        <table class="w-screen">
            <thead>
                <tr class="text-center">
                    <th class="p-4">ユーザーID</th>
                    <th class="p-4">名前</th>
                    <th class="p-4">メールアドレス</th>
                    <th class="p-4">登録日</th>
                    <th class="p-4">更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td class="p-4">{{ $user->user_id }}</td>
                        <td class="p-4">{{ $user->name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">{{ $user->created_at }}</td>
                        <td class="p-4">{{ $user->updated_at }}</td>
                        <td class="p-4">
                            <a href="{{ url('owner/users-list/' . $user->user_id) }}" class="bg-cyan-600 text-white text-bold p-2 rounded">
                                詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
        {{ $users->links() }}
    </div>

@endsection