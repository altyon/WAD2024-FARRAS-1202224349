@extends('layouts.app')

@section('title', 'Edit Lecturer')

@section('content')
<h1>Edit Lecturer</h1>
<form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="lecturer_code">Code:</label>
        <input type="text" id="lecturer_code" name="lecturer_code" value="{{ $lecturer->lecturer_code }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="lecturer_name">Name:</label>
        <input type="text" id="lecturer_name" name="lecturer_name" value="{{ $lecturer->lecturer_name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nip">NIP:</label>
        <input type="text" id="nip" name="nip" value="{{ $lecturer->nip }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $lecturer->email }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="telephone_number">Phone:</label>
        <input type="text" id="telephone_number" name="telephone_number" value="{{ $lecturer->telephone_number }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection