<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site em Desenvolvimento</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url(https://lovatel.com.br/img/telas/backgroundLovatel.svg) center;
            background-size: cover;
            overflow: hidden;
        }

        .logo a img {
            display: block;
            width: 100%;
            height: auto;
            transition: all 0.3s ease;
            animation: pulseGlow 1.5s infinite alternate;
        }

        /* Animação de brilho pulsante */
        @keyframes pulseGlow {
            0% {
                filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.5)) drop-shadow(0 0 10px rgba(255, 255, 255, 0.4));
            }
            100% {
                filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.8)) drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
            }
        }
    </style>
</head>

<body>
    <div class="logo">
        <a href="https://www.lovatel.com.br">
            <img src="https://lovatel.com.br/img/telas/logoLovatel.svg" alt="lovatel agencia digital">
        </a>
    </div>
</body>
</html>
