<!DOCTYPE html>
<html lang=&quot;en-US&quot;>
    <head>
    <meta charset=&quot;utf-8&quot;>
    </head>
    <body>
<h2>CUSTOMER:</h2>
<div>
    <p> User ID: {{ $user->id }}</p>
    <p> User Firstname: {{ $user->firstname }} </p>
    <p> User Lastname: {{ $user->lastname }} </p>
    <p> Message: {{ $mail->body }} </p>
</div>
</body>
</html>