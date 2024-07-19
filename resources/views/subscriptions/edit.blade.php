@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="card mt-4 mb-4 p-4 shadow-lg rounded-lg">
                    <div class="card-header border-b border-gray-200 mb-4">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Update Subscription
                            <a href="{{ route('subscriptions.index') }}">
                                <button class="bg-red-500 text-black py-0.8 px-2 rounded-md hover:bg-gray-700
                                 transition duration-300" style="background: black;color: white;margin-bottom: 4px">
                                    Back
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subscriptions.update', $subscription) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" value="{{ $subscription->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Month</label>
                                <input type="number" name="month" value="{{ $subscription->month }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Weight Type</label>
                                <input type="text" name="weight_type" value="{{ $subscription->weight_type }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                                  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                   sm:text-sm" required>
                            </div>
                {{--            <div class="mb-4">--}}
                {{--                <label class="block text-gray-700">Image</label>--}}
                {{--                <input type="file" name="image" class="w-full border-gray-300 rounded">--}}
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
