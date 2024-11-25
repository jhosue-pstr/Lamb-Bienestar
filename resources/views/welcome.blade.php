<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamb-Bienestar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle, green, rgb(113, 158, 22));
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }

        button {
            padding: 0.8em 1.8em;
            border: 2px solid #17C3B2;
            position: relative;
            overflow: hidden;
            background-color: transparent;
            text-align: center;
            text-transform: uppercase;
            font-size: 16px;
            transition: .3s;
            z-index: 1;
            font-family: inherit;
            color: black;
        }

        button::before {
            content: '';
            width: 0;
            height: 300%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
            background: lime;
            transition: .5s ease;
            display: block;
            z-index: -1;
        }

        button:hover::before {
            width: 105%;
        }

        button:hover {
            color: #111;
        }

        h1,
        p {
            margin-bottom: 10px;
            color: #111;
            font-size: 100px;
        }
    </style>
</head>

<body>
    <div>
        <h1>Bienvenido</h1>
        <p> A tu Lamb Bienestar</p>
        <a href="{{ route('login') }}">
            <button>Iniciar sesión</button>
        </a>

    </div>
</body>

</html>
