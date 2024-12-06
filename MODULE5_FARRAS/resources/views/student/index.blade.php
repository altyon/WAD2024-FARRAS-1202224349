@extends('layouts.app')

@section('title', 'Student')

@section('content')
<h1>Students</h1>
<a href="{{ route('student.create') }}" class="btn btn-primary mb-3">Add Student</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Advisor</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($student as $student)
        <tr>
            <td>{{ $student->nim }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->major }}</td>
            <td>{{ $student->lecturer->lecturer_name ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
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