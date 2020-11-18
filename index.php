<?php
function extractDddNumero($value)
{
    $onlyNumbers = preg_replace('/[^\d]/i', '', $value);

    if (strlen($onlyNumbers) < 10) {
        throw new Exception('Número não possui a quantidade de dígitos necessárias');
    }

    if (strlen($onlyNumbers) >= 11) {
        $number = substr($onlyNumbers, -9);
        $ddd = substr($onlyNumbers, -11, 2);
    } else {
        $number = substr($onlyNumbers, -8);
        $ddd = substr($onlyNumbers, -10, 2);

        $initials = ['6', '7','8','9'];

        if (in_array($number[0], $initials, true)) {
            $number = '9' . $number;
        }
    }

    return [$ddd, $number];
}

$numbers = [
    '11987654321',
    '011987654321',
    '5511987654321',
    '+5511987654321',
    '05511987654321',
    '005511987654321',
    '+005511987654321',
    '11-987654321',
    '11-98765-4321',
    '55-11-987654321',
    '3186972676',
    '3156972676',
];

foreach ($numbers as $number) {
    try {
        echo json_encode(extractDddNumero($number)) . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}