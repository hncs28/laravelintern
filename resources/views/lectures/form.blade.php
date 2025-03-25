<!DOCTYPE html>
<html>
<head>
    <title>Lecture Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        button[type="submit"] {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #27ae60;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            input[type="text"] {
                font-size: 14px;
            }

            button[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <form action="{{ route('lectures.store') }}" method="POST">
        @csrf
        <label for="lectureName">Lecture Name:</label>
        <input type="text" id="lectureName" name="lectureName" required>
        <label for="lecturePhone">Lecture Phone:</label>
        <input type="text" id="lecturePhone" name="lecturePhone" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>