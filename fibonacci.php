<?php

function fibonacciRecursive($n)
{
    if ($n <= 1) {
        return $n;
    }

    return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
}

$input = 5;

for ($i = 0; $i < $input; $i++) {

    if ($input === ($i + 1)) {
        echo fibonacciRecursive($i);
    } else {
        echo fibonacciRecursive($i) . ",";
    }
}
