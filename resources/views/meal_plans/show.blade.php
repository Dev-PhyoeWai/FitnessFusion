@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Meal Plan Details</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <tbody>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">Subscription ID</td>
                <td class="border border-gray-300 px-4 py-2">{{ $mealPlan->subscription_id }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Ingredient</td>
                <td class="border border-gray-300 px-4 py-2">{{ $mealPlan->ingredient }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">Calories</td>
                <td class="border border-gray-300 px-4 py-2">{{ $mealPlan->calories }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Type</td>
                <td class="border border-gray-300 px-4 py-2">{{ $mealPlan->type }}</td>
            </tr>
            @if($mealPlan->image)
                <tr class="bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Image</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <img src="{{ Storage::url($mealPlan->image) }}" alt="Meal Plan Image" class="w-24">
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('meal_plans.edit', $mealPlan->id) }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Edit</a>
            <form action="{{ route('meal_plans.destroy', $mealPlan->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Delete</button>
            </form>
            <a href="{{ route('meal_plans.index') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Back to List</a>
        </div>
    </div>
@endsection
