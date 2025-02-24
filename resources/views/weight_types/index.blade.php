@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Weight Types</h1>
        <a href="{{ route('weight-types.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Add New Weight Type</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white mt-4">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($weightTypes as $weightType)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $weightType->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $weightType->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('weight-types.edit', $weightType->id) }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-700 transition duration-300">Edit</a>
                        <form action="{{ route('weight-types.destroy', $weightType->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700 transition duration-300">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
