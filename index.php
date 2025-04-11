<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>2л/р</title>
    </head>
    <body>
        <?php

            $encode = "utf-8";
            $firstName = 'александр';
            $lastName = 'шишлонов';
            $middleName = 'алексеевич';

            function getFio($lastName, $firstName, $middleName, $encode){
                $lastName = mb_strtoupper(mb_substr($lastName,0,1, $encode), $encode).mb_substr($lastName,1,mb_strlen($lastName,$encode),$encode);
                $firstName = mb_strtoupper(mb_substr($firstName, 0, 1, $encode), $encode);
                $middleName = mb_strtoupper(mb_substr($middleName, 0, 1, $encode), $encode);
                echo $lastName.' '.$firstName.'.'.$middleName.".\n";
            }

           getFio($lastName, $firstName, $middleName, $encode);

            function getSaturdays(){
                $startDate = new DateTime("2021-01-01 Saturday");
                $endDate = new DateTime("2022-12-31"); 
                $interval = new DateInterval('P7D');
                $saturdays = [];
                foreach (new DatePeriod($startDate, $interval, $endDate) as $dat) {
                    if ($dat->format('d') <= 20) {
                        $saturdays[] = $dat->format('d.m.Y');
                    }
                }
                return $saturdays;
            }

            $saturdays = getSaturdays();
            foreach ($saturdays as $sat){
                echo $sat. "<br>";
            }

        ?>
    </body>
</html>
