<?php
namespace App;

use DateTime;

class BuildReport
{
    public function BuildReport()
    {
        $report = [];
        foreach(file('./data/abbreviations.txt') as $line)
        {
            $names = explode('_', $line);
            foreach(file('./data/start.log') as $start)
            {
                $driverStart = explode('_', $start);
                if(mb_substr($driverStart[0], 0, 3) == $names[0])
                {
                    foreach(file('./data/end.log') as $end)
                    {
                        $driverEnd = explode('_', $end);
                        if($driverStart[0] == $driverEnd[0])
                        {
                            $startTime = DateTime::createFromFormat('H:i:s.u', trim($driverStart[1]));
                            $endTime = DateTime::createFromFormat('H:i:s.u', trim($driverEnd[1]));
                            $timeDiff = $endTime->diff($startTime)->format('%H:%i:%s.%f');
                        }
                        
                    }   
                }
                
            }
           $report[] = [$names[1], trim($names[2]), $timeDiff];
           usort($report, function($a, $b)
           {
            return $a[2] > $b[2];
           });   
        }
        return $report;
    }
}