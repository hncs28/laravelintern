<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3); 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; 
        }
        h2 {
            color: #fff; 
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 25px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
        }
        #loginForm {
            background: rgba(255, 255, 255, 0.95); 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); 
            width: 320px;
            backdrop-filter: blur(5px); 
            animation: fadeIn 0.5s ease-in-out; 
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        #loginForm input[type="text"],
        #loginForm input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 12px 0;
            border: 2px solid #e0e0e0; 
            border-radius: 8px;
            font-size: 16px;
            background: #fafafa; 
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s; 
        }
        #loginForm input[type="text"]:focus,
        #loginForm input[type="password"]:focus {
            border-color: #6e8efb; 
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.5); 
            outline: none;
            background: #fff; 
        }
        #loginForm button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #6e8efb, #a777e3); 
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s; 
        }
        #loginForm button:hover {
            transform: translateY(-2px); 
            box-shadow: 0 4px 12px rgba(110, 142, 251, 0.4); 
        }
        #loginForm button:active {
            transform: translateY(0); 
        }
        #errorMessage {
            margin-top: 20px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            color: #ff4d4d; 
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); 
        }
        .registerbutton{
            background: blue; 
            color: greenyellow;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s; 
            padding: 14px;
            width:20%;
            margin-top: 10px;
        }
    </style>
    </style>
</head>
<body>
    <h2>Login</h2>
    <form id="loginForm">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <button class="registerbutton" onclick="window.location.href='{{ route('registerform') }}'">Register</button>
    <p id="errorMessage" style="color: red;"></p>

    <script>
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var baseurl = "{{ config('app.url') }}";
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                
                let username = $('#username').val();
                let password = $('#password').val();

                $.ajax({
                    url: `${baseurl}/api/login`,
                    type: "POST",
                    data: { username: username, password: password },
                    success: function (response) {
                        localStorage.setItem("Token", response.token);
                        window.location.href = "{{ route('dashboard') }}"; 
                    },
                    error: function () {
                        $('#errorMessage').text("Invalid username or password");
                    }
                });
            });
        });
    </script>

</body>
</html>