@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Workout Plans</h1>
            <a href="{{ route('workout_plans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Workout Plan</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Name</th>
                <th class="py-2">Body Part</th>
                <th class="py-2">Type</th>
                <th class="py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($workoutPlans as $workoutPlan)
                <tr>
                    <td class="py-2">{{ $workoutPlan->id }}</td>
                    <td class="py-2">{{ $workoutPlan->name }}</td>
                    <td class="py-2">{{ $workoutPlan->body_part }}</td>
                    <td class="py-2">{{ $workoutPlan->type }}</td>
                    <td class="py-2">
                        <a href="{{ route('workout_plans.show', $workoutPlan) }}" class="text-blue-500">View</a>
                        <a href="{{ route('workout_plans.edit', $workoutPlan) }}" class="text-yellow-500 mx-2">Edit</a>
                        <form action="{{ route('workout_plans.destroy', $workoutPlan) }}" method="POST" class="inline">
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
