@extends('layouts.master')
@section('title','Subscription Page')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">SubWeights</h1>
        <a href="{{ route('sub-weights.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Add New SubWeight</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white mt-4">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Subscription Type</th>
                <th class="py-2 px-4 border-b">Weight Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subWeights as $subWeight)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $subWeight->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $subWeight->subscription->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $subWeight->weight->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
