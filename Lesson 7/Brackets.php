<?php

/**
 * A string S consisting of N characters is considered to be properly nested if any of the following conditions is true: S is empty;
 * S has the form "(U)" or "[U]" or "{U}" where U is a properly nested string; S has the form "VW" where V and W are properly nested strings.
 * For example, the string "{[()()]}" is properly nested but "([)()]" is not. Write a function: function solution($S);
 * that, given a string S consisting of N characters, returns 1 if S is properly nested and 0 otherwise.
 * For example, given S = "{[()()]}", the function should return 1 and given S = "([)()]", the function should return 0, as explained above.
 * Write an efficient algorithm for the following assumptions: N is an integer within the range [0..200,000];
 * string S consists only of the following characters: "(", "{", "[", "]", "}" and/or ")".
 */

function solution($S)
{
    $parity = ['(' => ')', '[' => ']', '{' => '}'];
    $left = ['(', '[', '{'];
    $newArr = [];
    $count = 0;

    if (empty($S)) {
        return 1;
    }
    $S = str_split($S);

    if ($S[count($S) - 1] != $parity[$S[0]]) {
        return 0;
    }

    foreach ($S as $key => $item) {
        if ($key == 0 && !in_array($item, $left)) {
            return 0;
        }
        if (in_array($item, $left)) {
            $newArr[] = $item;
            $count++;
        } else {
            unset($newArr[array_search(array_search($item, $parity), $newArr)]);
            $count--;
        }
    }
    if (empty($newArr) && $count == 0) {
        return 1;
    }
    return 0;
}
