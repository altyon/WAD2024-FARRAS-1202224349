@extends('layouts.app')

@section('title', 'Lecturer')

@section('content')
<h1>Lecturers</h1>
<a href="{{ route('lecturer.create') }}" class="btn btn-primary mb-3">Add Lecturer</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Lecturer Code</th>
            <th>Lecturer Name</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lecturer as $lecturer)
        <tr>
            <td>{{ $lecturer->lecturer_code }}</td>
            <td>{{ $lecturer->lecturer_name }}</td>
            <td>{{ $lecturer->nip }}</td>
            <td>{{ $lecturer->email }}</td>
            <td>{{ $lecturer->telephone_number }}</td>
            <td>
                <a href="{{ route('lecturer.edit', $lecturer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('lecturer.destroy', $lecturer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection