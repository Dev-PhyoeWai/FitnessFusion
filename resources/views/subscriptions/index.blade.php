@extends('layouts.master')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Subscriptions</h1>
            <a href="{{ route('subscriptions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Subscription</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Name</th>
                <th class="py-2">Month</th>
                <th class="py-2">Weight Type</th>
                <th class="py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td class="py-2">{{ $subscription->id }}</td>
                    <td class="py-2">{{ $subscription->name }}</td>
                    <td class="py-2">{{ $subscription->month }}</td>
                    <td class="py-2">{{ $subscription->weight_type }}</td>
                    <td class="py-2">
                        <a href="{{ route('subscriptions.show', $subscription) }}" class="text-blue-500">View</a>
                        <a href="{{ route('subscriptions.edit', $subscription) }}" class="text-yellow-500 mx-2">Edit</a>
                        <form action="{{ route('subscriptions.destroy', $subscription) }}" method="POST" class="inline">
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
