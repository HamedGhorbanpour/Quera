<!DOCTYPE html>
<html>
<head>
    <title>Generate Combinations</title>
</head>
<body>
<h1>Generate Combinations</h1>
<form method="post" action="">
    <label for="input">Enter a value: </label>
    <input type="text" id="input" name="n" required>
    <input type="submit" value="Generate">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["n"]) && is_numeric($_POST["n"])) {
        $n = intval($_POST["n"]);
        function generateCombinations($ones, $zeros, $current = '', $lastZeroCount = 0, &$count = 0)
        {
            if ($ones == 0 && $zeros == 0) {
                if (substr($current, 0, 2) !== '00' && substr($current, -2) !== '00') {
                    echo $current . "  |  ";
                    $count++;
                }
            } else {
                if ($ones > 0) {
                    generateCombinations($ones - 1, $zeros, $current . '1', 0, $count);
                }

                if ($zeros > 0 && $lastZeroCount < 2) {
                    generateCombinations($ones, $zeros - 1, $current . '0', $lastZeroCount + 1, $count);
                }
            }
        }
        function generatePatterns($n)
        {
            $ones = $n + 1;
            $zeros = 2 * $n - 1;
            $count = 0;
            $length = $ones + $zeros;
            echo "<br>Total number of people: $length<br>";
            echo "People without popcorn: $zeros<br>";
            echo "Number of popcorns: $ones";
            echo "<br>----------------------------------------";
            echo "<br>Combinations:<br>";
            generateCombinations($ones, $zeros, '', 0, $count);
            echo "<br>----------------------------------------<br>";
            echo "Combinations Count: $count";
        }
        generatePatterns($n);
    } else {
        echo "Please fill out this field . The field should be a Number";
    }
}
?>
</body>
</html>