@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<h1 class="mb-4">Add Student</h1>
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
<form action="{{ route('student.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nim" class="form-label">NIM:</label>
        <input type="text" name="nim" id="nim" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="major" class="form-label">Major:</label>
        <input type="text" name="major" id="major" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="dosen_id" class="form-label">Advisor:</label>
        <select name="dosen_id" id="dosen_id" class="form-control" required>
            @foreach ($lecturer as $lecturer)
            <option value="{{ $lecturer->id }}">{{ $lecturer->lecturer_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection