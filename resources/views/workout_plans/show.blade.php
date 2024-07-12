@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Workout Plan Details</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <tbody>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">Subscription ID</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->subscription_id }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Name</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->name }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">Body Part</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->body_part }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Type</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->type }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 font-semibold">Set</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->set }}</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Raps</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->raps }}</td>
            </tr>
            @if($workoutPlan->image)
                <tr class="bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Image</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <img src="{{ Storage::url($workoutPlan->image) }}" alt="Workout Plan Image" class="w-24">
                    </td>
                </tr>
            @endif
            <tr>
                <td class="border border-gray-300 px-4 py-2 font-semibold">Gender</td>
                <td class="border border-gray-300 px-4 py-2">{{ $workoutPlan->gender }}</td>
            </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('workout_plans.edit', $workoutPlan->id) }}" class="inline-block bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600">Edit</a>
            <form action="{{ route('workout_plans.destroy', $workoutPlan->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-black py-2 px-4 rounded hover:bg-red-600">Delete</button>
            </form>
            <a href="{{ route('workout_plans.index') }}" class="inline-block bg-gray-500 text-black py-2 px-4 rounded hover:bg-gray-600">Back to List</a>
        </div>
    </div>
@endsection
