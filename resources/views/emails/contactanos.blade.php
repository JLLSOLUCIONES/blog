<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        h1{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Correo electrónico</h1>
   

    <P><strong>First Name:</strong> {{$contacto['firstname']}}</P>
    <P><strong>Last Name:</strong> {{$contacto['lastname']}}</P>
    <P><strong>E-Mail:</strong> {{$contacto['mail']}}</P>
    <P><strong>Message:</strong> {{$contacto['message']}}</P>
</body>
</html>
