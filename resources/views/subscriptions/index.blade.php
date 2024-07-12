@extends('layouts.master')
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">Subscriptions</h1>
            <a href="{{ route('subscriptions.create') }}" class="inline-block mb-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Subscription</a>

            <table class="min-w-full bg-white border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300">Name</th>
                    <th class="py-2 px-4 border-b border-gray-300">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscriptions as $subscription)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <a href="{{ route('subscriptions.show', $subscription->id) }}" class="text-blue-500 hover:underline">{{ $subscription->name }}</a>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="inline-block bg-green-500 text-black py-2 px-4 rounded hover:bg-green-600">Edit</a>
                            <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-black py-2 px-4 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
