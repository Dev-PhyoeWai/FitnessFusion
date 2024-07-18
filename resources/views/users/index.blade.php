@extends('layouts.master')

@section('content')

    @include('role-permission.nav-links')

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Users</h1>
            <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Name</th>
                <th class="py-2">Email</th>
                <th class="py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2">{{ $user->id }}</td>
                    <td class="py-2">{{ $user->name }}</td>
                    <td class="py-2">{{ $user->email }}</td>
                    <td class="py-2">
                        <a href="{{ route('users.edit', $user) }}" class="text-yellow-500 mx-2">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
