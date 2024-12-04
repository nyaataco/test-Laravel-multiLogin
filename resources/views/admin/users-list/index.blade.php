@extends('layouts.admin-dashboard')

@section('content')

<h1 class="text-lg font-bold mb-10">ユーザー一覧</h1>

    <div class="flex justify-center">
        <table class="w-screen">
            <thead>
                <tr class="text-center">
                    <th class="p-4">登録者ID</th>
                    <th class="p-4">名前</th>
                    <th class="p-4">日報</th>
                    <th class="p-4">シフト</th>
                    <th class="p-4">スキル</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td class="p-4">{{ $user->user_id }}</td>
                        <td class="p-4">{{ $user->name }}</td>
                        <td class="p-4">
                            xxxx/xx/xx
                            check
                        </td>
                        <td class="p-4">
                            xxxx/xx
                            check
                        </td>
                        <td class="p-4">
                            xxxx/xx
                            check
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    


@endsection