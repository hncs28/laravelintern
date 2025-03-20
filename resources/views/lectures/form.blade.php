<!DOCTYPE html>
<html>
<head>
    <title>Lecture Form</title>
</head>
<body>
    <form action="{{ route('lectures.store') }}" method="POST">
        @csrf
        <label for="lectureName">Lecture Name:</label>
        <input type="text" id="lectureName" name="lectureName" required>
        <br>
        <label for="lecturePhone">Lecture Phone:</label>
        <input type="text" id="lecturePhone" name="lecturePhone" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
