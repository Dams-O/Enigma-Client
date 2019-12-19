<?php
function Cesar($chaine,$choix,$pos,$mode, $fin){
        $trouve = "";
        $newPos = 1;
        $k = intval($choix);
        $l = intval($fin);
        for($k; $k < $l; $k++) {
            if (stristr($chaine, 'noelarrive') === FALSE) {
                $test = "abcdefghijklmnopqrstuvwxyz";
                if ($mode != "0") {
                    if($newPos != 0){
                        $newPos = 0;
                        $pos = -$pos;
                    }
                }
                for ($i = 0; $i < strlen($chaine); $i++) {
                    if (strpos($test, $chaine[$i]) !== false) {
                        $j = strpos($test, substr($chaine, $i, 1));

                        if ($pos == "-1") {
                            $j -= $choix;
                            while ($j < 0) {
                                $j += strlen($test);
                            }
                        } else {
                            $j += $choix;
                            while ($j + 1 > strlen($test)) {
                                $j -= strlen($test);
                            }
                        }
                        $chaine[$i] = $test[$j];
                    }
                }
            }
            else {
                $trouve = "Vous avez réussi à dechiffré le message, la voici : " . $chaine;
            }
            var_dump($chaine);
        }
        if (stristr($chaine, 'noelarrive') === FALSE) {
            $trouve = "Pas de message identifié";
        }
        return $trouve;
    }