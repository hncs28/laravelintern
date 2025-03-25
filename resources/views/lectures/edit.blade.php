<!DOCTYPE html>
<html>
<head>
    <title>Edit Lecture</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Lecture</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lectures.update', $lecture->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="lectureName">Lecture Name:</label>
                <input type="text" class="form-control" id="lectureName" name="lectureName" value="{{ $lecture->lectureName }}" required>
            </div>

            <div class="form-group">
                <label for="lecturePhone">Lecture Phone:</label>
                <input type="text" class="form-control" id="lecturePhone" name="lecturePhone" value="{{ $lecture->lecturePhone }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Lecture</button>
        </form>
    </div>
</body>
</html>