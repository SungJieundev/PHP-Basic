<?php
$a = 0;
$b = 0;

echo "1. 더하기\n";
echo "2. 빼기\n";
echo "3. 곱하기\n";
echo "4. 나누기\n";
echo "원하는 연산 >  ";

$select = 0;
fscanf( STDIN, "%d\n", $select);

fscanf( STDIN, "%f %f\n", $a, $b);

if ($select === 1) {
echo $a + $b;
}else if ($select === 2) {
    echo $a - $b;
}else if ($select === 3) {
    echo $a * $b;
}else if ($select === 4) {
    if ($b == 0)  {
        echo "0으로 나눌 수 없습니다.";
    }else {
        echo $a / $b;
    }
} else {
    echo "범위를 벗어났습니다.\n";
}
