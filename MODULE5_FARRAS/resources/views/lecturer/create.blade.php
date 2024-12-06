@extends('layouts.app')

@section('title', 'Add Lecturer')

@section('content')
<h1 class="mb-4">Add Lecturer</h1>

<!-- Visible error message -->
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('lecturer.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="lecturer_code" class="form-label">Code:</label>
        <input type="text" name="lecturer_code" id="lecturer_code" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="lecturer_name" class="form-label">Name:</label>
        <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP:</label>
        <input type="text" name="nip" id="nip" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telephone_number" class="form-label">Phone:</label>
        <input type="text" name="telephone_number" id="telephone_number" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection