@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Details</h1>
        <p><strong>Name:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Phone:</strong> {{ $client->phone }}</p>
        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
