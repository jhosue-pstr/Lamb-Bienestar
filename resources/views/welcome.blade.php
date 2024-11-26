<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamb-Bienestar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes moveText {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }

        @keyframes moveLeft {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-move-text {
            animation: moveText 2s ease-out;
        }

        .animate-move-left {
            animation: moveLeft 2s ease-out;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-green-500 to-yellow-500 h-screen flex justify-center items-center">
    <div class="text-center">
        <h1 class="text-6xl text-black mb-4 animate-move-text">Bienvenido</h1>
        <p class="text-4xl text-black mb-10 animate-move-text">A tu Lamb Bienestar</p>
        <a href="{{ route('login') }}">
            <button
                class="px-8 py-3 border-2 border-teal-400 text-black font-semibold text-lg uppercase relative overflow-hidden group">
                Iniciar sesión
                <span
                    class="absolute w-0 h-0 bg-lime-500 transition-all group-hover:w-full group-hover:h-full duration-500"></span>
            </button>
        </a>
    </div>

    <img src="/imagenes/mascota2.png" alt="Mascota" class="w-96 h-96 animate-move-left">
</body>

</html>
