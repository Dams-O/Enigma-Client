<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Kube CSS, Librairie complete dans ressources/kube -->
        <link rel="stylesheet" type="text/css" href="{{ asset('kube.min.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script>
            var conn = new WebSocket('ws://localhost:8088');
            conn.onopen = function(e) {
                console.log("Connection established!");
                conn.send('Hello World');
            };

            conn.onmessage = function(e) {
                let data = JSON.parse(e.data);
                Cesar(data['chaine'],data['choix'],data['pos'],data['mode'],data['fin']);
            };

            function Cesar($chaine,$choix,$pos,$mode, $fin){
                console.log($chaine);
                console.log('choix : ' + $choix);
                console.log('pos : ' + $pos);
                console.log('mode : ' + $mode);
                console.log('fin : ' + $fin);
                $trouve = "";
                $newPos = 1;
                $k = parseInt($choix);
                $l = parseInt($fin);
                console.log($chaine);
                for($k; $k < $l; $k++) {
                    if (!$chaine.includes('noelarrive')) {
                        $test = "abcdefghijklmnopqrstuvwxyz";
                        if ($mode != "0") {
                            if($newPos != 0){
                                $newPos = 0;
                                $pos = -$pos;
                            }
                        }
                        for ($i = 0; $i < $chaine.length; $i++) {
                            if ($test.indexOf($chaine[$i])) {
                                $tarace = $chaine.substring($i, $i+1);
                                $j = $test.indexOf($tarace);
                                if ($pos == "-1") {
                                    $j = $j - $choix;
                                    while ($j < 0) {
                                        $j = $j + $test.length;
                                    }
                                } else {
                                    $j += $choix;
                                    while ($j + 1 > $test.length) {
                                        $j -= $test.length;
                                    }
                                }
                                //console.log($chaine);
                                $chaine = $chaine.substring(0, $i) + $test[$j] + $chaine.substring($i+1, $chaine.length);
                            }
                        }
                    }
                    else {
                        $trouve = "Vous avez réussi à dechiffré le message, la voici : " + $chaine;
                    }
                    console.log($chaine);
                }
                if (!$chaine.includes('noelarrive')) {
                    $trouve = "Pas de message identifié";
                }
                console.log($trouve);
            };
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <button id="test" class="button is-big">Go</button>
                    <p>Page connecté au webservice</p>
                </div>
            </div>
        </div>
    </body>
</html>
