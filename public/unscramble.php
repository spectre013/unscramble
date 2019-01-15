<?php 

function contains($word) {
    $wlen = strlen($word);
    if ($wlen < 3 || $wlen > 10) {
        return false;
    }

    for ($i = 0; $i < $wlen; $i++) {
        $w[$i] = $word[$i];
    }

    $b = $GLOBALS['b'];
    foreach ($b as $n => $c) {
        foreach ($w as $k => $v) {
            if ($v == $c) {
                unset($w[$k]);
                unset($b[$n]);
                break;
            }
        }
    }
    //echo "count: ". count($w) ."\n";
    if (count($w) > 0) {
        return false;
    }

    return true;
}

function mycmp($a, $b)
    {
        $ca = strlen($a);
        $cb = strlen($b);
        if ($ca == $cb) {
            return 0;
        }

        if ($ca > $cb) {
            return 1;
        }

        return -1;
    }