@extends('layouts.app')

@section('content')
    <h1>User List</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
                <th>Jenis Kelamin</th>
                <th>No. Telpon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('M j, Y') }}</td>
                    <td>{{ $user->jenis_kelamin }}</td>
                    <td>{{ $user->no_telp }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection