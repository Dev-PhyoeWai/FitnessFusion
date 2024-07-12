@extends('layouts.master')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Create Meal Plan</h1>
    <form action="{{ route('meal_plans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
{{--        <div>--}}
{{--            <label class="block text-sm font-medium text-gray-700">Subscription ID:</label>--}}
{{--            <input type="text" name="subscription_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">--}}
{{--        </div>--}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Ingredient:</label>
            <input type="text" name="ingredient" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Calories:</label>
            <input type="number" name="calories" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Type:</label>
            <input type="text" name="type" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Image:</label>
            <input type="file" name="image" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create
        </button>
    </form>

@endsection
