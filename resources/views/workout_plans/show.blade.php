@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $workoutPlan->name }}</h1>

        <table class="table-auto w-full">
            <tbody>
            <tr>
                <td class="border px-4 py-2"><strong>Body Part:</strong></td>
                <td class="border px-4 py-2">{{ $workoutPlan->body_part }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Type:</strong></td>
                <td class="border px-4 py-2">{{ $workoutPlan->type }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Sets:</strong></td>
                <td class="border px-4 py-2">{{ $workoutPlan->sets }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Reps:</strong></td>
                <td class="border px-4 py-2">{{ $workoutPlan->reps }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Gender:</strong></td>
                <td class="border px-4 py-2">{{ $workoutPlan->gender }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Image:</strong></td>
                <td class="border px-4 py-2"><img src="{{ $workoutPlan->image }}" alt="{{ $workoutPlan->name }}"></td>
            </tr>
            <tr>
                <td class="border px-4 py-2"><strong>Subscription:</strong></td>
                <td class="border px-4 py-2">{{ $workoutPlan->subscription->name }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2" colspan="2">
                    <a href="{{ route('workout_plans.edit', $workoutPlan) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

                    <form action="{{ route('workout_plans.destroy', $workoutPlan) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
