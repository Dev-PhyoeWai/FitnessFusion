@extends('layouts.master')
@section('title','Subscription Create Page')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create SubWeight</h1>
        <form action="{{ route('sub-weights.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="subscription_id" class="block text-gray-700 text-sm font-bold mb-2">Subscription Types</label>
                @foreach($subscriptionTypes as $subscriptionType)
                    <div class="mb-2">
                        <input type="checkbox" name="subscription_id[]" value="{{ $subscriptionType->id }}" class="mr-2 leading-tight">
                        <label class="text-gray-700">{{ $subscriptionType->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                <label for="weight_id" class="block text-gray-700 text-sm font-bold mb-2">Weight Types</label>
                @foreach($weightTypes as $weightType)
                    <div class="mb-2">
                        <input type="checkbox" name="weight_id[]" value="{{ $weightType->id }}" class="mr-2 leading-tight">
                        <label class="text-gray-700">{{ $weightType->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Submit</button>
        </form>
    </div>

@endsection
