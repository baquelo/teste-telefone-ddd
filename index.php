<?php
function extractDddNumero($value)
{
    $onlyNumbers = preg_replace('/[^\d]/i', '', $value);

    if (strlen($onlyNumbers) < 10) {
        throw new Exception('Número não possui a quantidade de dígitos necessárias');
    }

    $mobileInitials = ['6', '7', '8', '9'];

    if (strlen($onlyNumbers) >= 11 && (in_array($onlyNumbers[-8], $mobileInitials, true) || $onlyNumbers[-9] === '9')) {
        $number = substr($onlyNumbers, -9);
        $ddd = substr($onlyNumbers, -11, 2);
    } else {
        $number = substr($onlyNumbers, -8);
        $ddd = substr($onlyNumbers, -10, 2);

        if (in_array($number[0], $mobileInitials, true)) {
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
    '01134264073',
    '551134264073',
    '0551134264073',
    '+551134264073',
    '11946776602',
    '19946776602',
    '019946776602',
    '5519946776602',
    '+5519946776602',
    '005519946776602',
];

foreach ($numbers as $number) {
    try {
        echo json_encode(extractDddNumero($number)) . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}