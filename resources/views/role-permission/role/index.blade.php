@extends('layouts.master')
@section('title','Permission Page')
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
                            Roles
                            <a href="{{ route('roles.create') }}">
                                <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: #0e7490; color: white;margin-bottom: 4px">
                                    Add Role
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
                                    <th class="py-2 px-4 border-b">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{$role->id}}</td>
                                        <td class="py-2 px-4 border-b">{{$role->name}}</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ url('roles/'.$role->id.'/give-permissions') }}"
                                               class="inline-block bg-green-500 text-green py-1 px-3
                                                    rounded-md hover:bg-green-600 transition duration-300"
                                            style="color: green">
                                                Add / Edit Role Permission
                                            </a>
                                            <span>  | </span>
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}"
                                               class="inline-block bg-green-500 text-green-700 py-1 px-3
                                                    rounded-md hover:bg-green-600 transition duration-300"
                                               style="color: darkorange">
                                                Edit
                                            </a>
                                            <span>|</span>
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}"
                                               class="inline-block bg-red-500 text-black py-1 px-3
                                                    rounded-md hover:bg-red-600 transition duration-300"
                                               style="color: red">
                                                Delete
                                            </a>
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
