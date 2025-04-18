<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2л/р</title>
</head>
<body>
<?php

$encoding = 'utf-8';
$firstName = 'александр';
$lastName = 'шишлонов';
$middleName = 'алексеевич';

function getFio(string $lastName, string $firstName, string $middleName, string $encoding): string
{
    $formattedLastName = mb_strtoupper(mb_substr($lastName, 0, 1, $encoding), $encoding)
        . mb_substr($lastName, 1, mb_strlen($lastName, $encoding), $encoding);
    
    $formattedFirstName = mb_strtoupper(mb_substr($firstName, 0, 1, $encoding), $encoding);
    $formattedMiddleName = mb_strtoupper(mb_substr($middleName, 0, 1, $encoding), $encoding);
    
    return $formattedLastName . ' ' . $formattedFirstName . '.' . $formattedMiddleName . '.';
}

echo getFio($lastName, $firstName, $middleName, $encoding) . "\n";

function getSaturdays(): array
{
    $saturdays = [];
    $startDate = new DateTime('2021-01-01 Saturday');
    $endDate = new DateTime('2022-12-31');
    $interval = new DateInterval('P7D');
    
    foreach (new DatePeriod($startDate, $interval, $endDate) as $date) {
        if ((int)$date->format('d') <= 20) {
            $saturdays[] = $date->format('d.m.Y');
        }
    }
    
    return $saturdays;
}

foreach (getSaturdays() as $saturday) {
    echo $saturday . "<br>";
}

?>
</body>
</html>