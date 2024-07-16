@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Meal Plans</h1>
            <a href="{{ route('meal_plans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Workout Plan</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Name</th>
                <th class="py-2">Ingredient</th>
                <th class="py-2">Type</th>
                <th class="py-2">Calories</th>
                <th class="py-2">Image</th>
                <th class="py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($mealPlans as $mealPlan)
                <tr>
                    <td class="py-2">{{ $mealPlan->id }}</td>
                    <td class="py-2">{{ $mealPlan->name }}</td>
                    <td class="py-2">{{ $mealPlan->ingredient }}</td>
                    <td class="py-2">{{ $mealPlan->type }}</td>
                    <td class="py-2">{{ $mealPlan->calories }}</td>
                    <td class="py-2">
                    @if($mealPlan->image)
                        <img src="{{ asset($mealPlan->image) }}" alt="Current Image" width="100">
                    @endif
                    </td>
                    <td class="py-2">
                        <a href="{{ route('meal_plans.show', $mealPlan) }}" class="text-blue-500">View</a>
                        <a href="{{ route('meal_plans.edit', $mealPlan) }}" class="text-yellow-500 mx-2">Edit</a>
                        <form action="{{ route('meal_plans.destroy', $mealPlan) }}" method="POST" class="inline">
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
