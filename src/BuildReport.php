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
                if($names[0] = $driverStart[0])
                {
                    foreach(file('./data/end.log') as $end)
                    {
                        $driverEnd = explode('_', $end);
                        if($driverStart[0] == $driverEnd[0])
                        {
                            $startTime = DateTime::createFromFormat('H:i:s.v', trim($driverStart[1]));
                            $endTime = DateTime::createFromFormat('H:i:s.v', trim($driverEnd[1]));
                            $timeDiff = $startTime->diff($endTime)->format('%i:%s.%f');
                        }
                    }   
                }
            }
           $report[] = [$names[1], trim($names[2]), $timeDiff];
        }
        return $report;
    }
}