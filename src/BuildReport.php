<?php

namespace App;

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
               $startTimeMillisec = DateTimeImmutable::createFromFormat('H:i:s.u', $driverStartTime[1]);
                $endTimeMillisec = DateTimeImmutable::createFromFormat('H:i:s.u', $driverEndTime[1]);
                $timeDiff = $endTimeMillisec - $startTimeMillisec;
             }
             }

        }

        if($names[0] = $driverEndTime[0] )
        {
            $report[] = array(
                'name' => $names[1],
                'car' => $names[2],
                'time' => date('i:s.v', $timeDiff));
            
        }   
    }
    return $report;
}
   

   
}
