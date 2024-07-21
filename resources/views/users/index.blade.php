@extends('layouts.master')

@section('content')

    @include('role-permission.nav-links')

    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">

                @if(session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative"
                         role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
                    <div class="card-header border-b border-gray-200 mb-4">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Users
                            <a href="{{ route('users.create') }}">
                                <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: #0e7490; color: white;margin-bottom: 4px">
                                    Add Users
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Card body content -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                <tr class="w-full bg-gray-200 text-left">
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">Name</th>
                                    <th class="py-2 px-4 border-b">Email</th>
                                    <th class="py-2 px-4 border-b">Roles</th>
                                    <th class="py-2 px-4 border-b">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                        <td class="py-2 px-4 border-b">
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $rolename)
                                                    <label class="bg-gray-900 rounded-md px-2 py-0"
                                                           style="background: #0e7490;color: white;margin-right: 1px">
                                                        {{$rolename}}
                                                    </label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b flex">
                                            <a href="{{ route('users.edit',$user) }}" class="inline-block bg-green-500 text-green-700 py-1 px-3
                                                    rounded-md hover:bg-green-600 transition duration-300"
                                               style="color: darkorange">Edit </a>
                                            <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-block bg-red-500 text-black py-1 px-3
                                                    rounded-md hover:bg-red-600 transition duration-300"
                                                        style="color: red">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
