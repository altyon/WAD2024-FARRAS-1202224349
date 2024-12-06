@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<h1>Edit Student</h1>
<form action="{{ route('student.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="{{ $student->nim }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="student_name" value="{{ $student->student_name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $student->email }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="major">Major:</label>
        <input type="text" id="major" name="major" value="{{ $student->major }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="dosen_id">Advisor:</label>
        <select id="dosen_id" name="dosen_id" class="form-control" required>
            <option value="">-- Select Advisor --</option>
            @foreach ($lecturer as $lecturer)
                <option value="{{ $lecturer->id }}" {{ $student->dosen_id == $lecturer->id ? 'selected' : '' }}>
                    {{ $lecturer->lecturer_name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection