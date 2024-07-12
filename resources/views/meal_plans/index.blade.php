@extends('layouts.master')

@section('content')
    <h1>Meal Plans</h1>
    <a href="{{ route('meal_plans.create') }}">Create New Meal Plan</a>
    <ul>
        @foreach($mealPlans as $plan)
            <li>
                <a href="{{ route('meal_plans.show', $plan->id) }}">{{ $plan->ingredient }}</a>
                <a href="{{ route('meal_plans.edit', $plan->id) }}">Edit</a>
                <form action="{{ route('meal_plans.destroy', $plan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
