@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Meal Plan</h1>
        <form action="{{ route('meal_plans.update', $mealPlan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $mealPlan->name }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Ingredient</label>
                <input type="text" name="ingredient" value="{{ $mealPlan->ingredient }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Type</label>
                <input type="text" name="type" value="{{ $mealPlan->type }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image</label>
                <input type="file" name="image"  class="w-full border-gray-300 rounded">
                @if($mealPlan->image)
                    <img src="{{ asset($mealPlan->image) }}" alt="Current Image" width="100">
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Calories</label>
                <input type="number" name="calories" value="{{ $mealPlan->calories }}" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Subscription</label>
                <select name="subscription_id" class="w-full border-gray-300 rounded" required>
                    @foreach($subscriptions as $subscription)
                        <option value="{{ $subscription->id }}" {{ $mealPlan->subscription_id == $subscription->id ? 'selected' : '' }}>{{ $subscription->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Meal Plan</button>
        </form>
    </div>
@endsection
