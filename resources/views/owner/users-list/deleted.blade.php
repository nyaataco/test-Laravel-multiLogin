@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10">削除済みユーザー一覧</h1>

    @if (session('flash_message'))
        <p class="text-red-600 font-bold">{{ session('flash_message') }}</p>
    @endif

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
                @foreach ($deletedUsers as $user)
                    <tr class="text-center columns-4">
                        <td class="p-4">{{ $user->user_id }}</td>
                        <td class="p-4">{{ $user->name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">{{ $user->created_at }}</td>
                        <td class="p-4">{{ $user->updated_at }}</td>
                        <td class="p-4">
                            <form action="{{ url('owner/users-list/' . $user->user_id . '/restore') }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-yellow-200 text-black text-bold p-2 rounded">
                                    復元
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection