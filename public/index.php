<?php
ini_set('display_errors', '1');
include('./unscramble.php');
$l = $_POST['l'];
$l = strtolower(preg_replace("/[^a-z-]/i", "", $l));
?>
<html>
<head>
<title>Unscramble Me</title>
<META NAME="keywords" CONTENT="Text,Twist,Text Twist,Unscramble,Free,Source,php">
<style>
    body {
        font-family: arial,helvetica;
    }
    #footer {
        margin-top: 10px;
    }
    .words {
        margin: 10px 5px;
        padding-bottom: 3px;
    }
</style>
</head>
<body>
<form action="index.php" method="post">
Enter scrambled letters:
<input type="text" name="l" value="<?=$l?>" size="20" maxlength="20">
<input type="submit" name="button" value="Unscramble">
</form>
<?
$l = '';
if (isset($_POST['l'])) {
    $time_start = microtime(true);
    $l = $_POST['l'];
    $len = strlen($l);

    $a = array('a' => 1, 'b' => 1, 'c' => 1, 'd' => 1, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 1, 'j' => 1, 'k' => 1, 'l' => 1, 'm' => 1, 'n' => 1, 'o' => 1, 'p' => 1, 'q' => 1, 'r' => 1, 's' => 1, 't' => 1, 'u' => 1, 'v' => 1, 'w' => 1, 'x' => 1, 'y' => 1, 'z' => 1);


    for ($i = 0; $i < $len; $i++) {
        $b[$i] = $l[$i];
        unset($a[$l[$i]]);
    }

    $e = 'cat combined.txt';
    //out, err := exec.Command("cat"," combined.txt | grep -v $k").Output()

    while (list($k) = each($a)) {
        if (!$e) {
            $e = "grep -v $k combined.txt";
        } else {
            $e .= ' | grep -v ' . $k;
        }
    }
    exec($e, $o);
    settype($w, 'array');
    foreach ($o as $v) {
        if (contains($v)) {
            $w[] = $v;
        }
    }

    usort($w, 'mycmp');

    $wc = 0;
    foreach ($w as $v) {
        $c = strlen($v);
        if ($wc != $c) {
            if($wc != 0) {
                echo '</div>';
            }
            echo '<div class="words">';
            echo "<b>$c letter words</b><br>";
        }
        $wc = $c;
        echo "$v &nbsp; ";
    }
    echo "</div>";
    echo '<div id="footer">';
    $time_end = microtime(true);
    $time = round($time_end - $time_start, 5);
    echo "Found " . count($w) . " words in $time seconds";
    echo "</div>";
}

?>
</body>
</html>