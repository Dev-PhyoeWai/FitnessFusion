@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
                    <div class="card-header border-b border-gray-200 mb-4">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Update User
                            <a href="{{ url('users') }}">
                                <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: black;color: white;margin-bottom: 4px">
                                    Back
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Card body content -->
                        <form action="{{ url('users/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" value="{{$user->name}}" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" >
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" readonly value="{{$user->email}}" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" >
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" >
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Roles</label>
                                <select name="roles[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" multiple >
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}"
                                        {{in_array($role,$userRoles) ? 'selected' : ''}}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{--            <div class="mb-4">--}}
                            {{--                <label class="block text-gray-700">Subscription</label>--}}
                            {{--                <select name="subscription_id" class="w-full border-gray-300 rounded" required>--}}
                            {{--                    @foreach($subscriptions as $subscription)--}}
                            {{--                        <option value="{{ $subscription->id }}">{{ $subscription->name }}</option>--}}
                            {{--                    @endforeach--}}
                            {{--                </select>--}}
                            {{--            </div>--}}
                            <div class="mb-4">
                                <button type="submit" class="bg-amber-200 text-black py-0.8 px-2 rounded-md
                                hover:bg-info-dark transition duration-300" style="color:white;background: #0e7490">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
