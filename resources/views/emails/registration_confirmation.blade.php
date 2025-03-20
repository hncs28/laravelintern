<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>
<body>
    <h1>Registration Confirmation</h1>
    <p>Dear {{ $detail->name }},</p>
<p>Thank you for registering on our platform. Here are your registration details:</p>
<ul>
    <li>Username: {{ $user->username }}</li>
    <li>Email: {{ $detail->email }}</li>
    <li>Type of Vehicle: {{ $detail->typeofvehicle }}</li>
    <li>Date of Birth: {{ $detail->dob }}</li>
</ul>
    <p>We are excited to have you on board!</p>
</body>
</html>
