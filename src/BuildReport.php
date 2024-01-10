<?php

namespace App;

use DateTime;
use DateTimeImmutable;

class BuildReport
{
public function BuildReport() 
{   
    $report = [];
    foreach(file('./data/abbreviations.txt') as $lineNames)
    {
        $names = explode('_', $lineNames);
        foreach(file('./data/end.log') as $lineEnd)
        {
            $driverEndTime = explode('_', $lineEnd);

            foreach(file('./data/start.log') as $lineStart)
            {
                $driverStartTime = explode('_', $lineStart);
                if($driverEndTime[0] == $driverStartTime[0])
             { 
               $format = 'H:i:s.v';   

            //    $startTime = new DateTime($driverStartTime[1]); вот так выдает одинаквый результат 53:12.46000
            //    $endTime = new DateTime($driverEndTime[1]);

            //    $startTime = DateTime::createFromFormat($format, $driverStartTime[1]); а вот так ошибку выдает PHP Fatal error:  Uncaught Error: Call to a member function diff() on bool
            //    $endTime = DateTime::createFromFormat($format, $driverEndTime[1]);

               $timeDiff = $endTime->diff($startTime);
               $time = $timeDiff->format('%i:%s.%f');
               
             }
             }

        }

        if($names[0] = $driverEndTime[0] )
        {
            $report[] = array($names[1], trim($names[2]), $time);    
        }   
    }
    return $report;
}
     
}
