@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Add Meal Plan</h1>
        <form action="{{ route('meal_plans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Ingredient</label>
                <input type="text" name="ingredient" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Type</label>
                <input type="text" name="type" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Calories</label>
                <input type="number" name="calories" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image</label>
                <input type="file" name="image" class="w-full border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Subscription</label>
                <select name="subscription_id" class="w-full border-gray-300 rounded" required>
                    @foreach($subscriptions as $subscription)
                        <option value="{{ $subscription->id }}">{{ $subscription->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Meal Plan</button>
        </form>
    </div>
@endsection
