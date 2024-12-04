@extends('layouts.owner-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10">管理者一覧</h1>

    @if (session('flash_message'))
        <p class="text-red-600 font-bold mb-10">{{ session('flash_message') }}</p>
    @endif

    <div class="mb-10 text-sky-600">
        <a href="{{ route('owner.admins-list.create') }}" class="mr-5">
            新規登録
        </a>

        <a href="{{ route('owner.admins-list.deleted') }}">
            削除済みデータ
        </a>
    </div>

    <div class="flex justify-center mb-14">
        <table class="w-screen">
            <thead>
                <tr class="text-center">
                    <th class="p-4">管理者ID</th>
                    <th class="p-4">名前</th>
                    <th class="p-4">メールアドレス</th>
                    <th class="p-4">登録日</th>
                    <th class="p-4">更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr class="text-center columns-4">
                        <td class="p-4">{{ $admin->admin_id }}</td>
                        <td class="p-4">{{ $admin->name }}</td>
                        <td class="p-4">{{ $admin->email }}</td>
                        <td class="p-4">{{ $admin->created_at }}</td>
                        <td class="p-4">{{ $admin->updated_at }}</td>
                        <td class="p-4">
                        <a href="{{ url('owner/admins-list/' . $admin->admin_id)  }}" class="bg-lime-600 text-white text-bold p-2 rounded">
                                詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
        {{ $admins->links() }}
    </div>

@endsection