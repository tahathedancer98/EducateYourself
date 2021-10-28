<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        button {
            display: inline-block;
            background-color:forestgreen;
            border-radius: 10px;
            border: 4px double #cccccc;
            color: #eeeeee;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }
        button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        button:hover {
            background-color: #1a202c;
        }
        button:hover span {
            padding-right: 25px;
        }
        button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>
<body>
No-Reply<br><br>
Hello {{$prenom}},<br><br>
Votre compte a été bien confirmé.<br><br>

<div>
    Votre mot de passe provisoir : <b>{{$password}}</b> <br>
    <b>Veuillez le changer dès que possible !</b><br><br>

    Vous allez utiliser votre <b>Email</b> et vous <b>mot de passe provisoire</b> pour vous connecter en vous rendant sur le lien ci-dessous.
</div>
<br><br>
<a href={{route('login')}}>
    <button>
        Se connecter
    </button>
</a>
</body>
</html>
