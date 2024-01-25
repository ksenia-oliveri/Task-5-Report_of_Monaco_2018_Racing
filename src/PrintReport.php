<?php
namespace App;
class PrintReport 
{
    public function PrintReport()
    {   
        $report = new BuildReport;
        $data = $report->BuildReport();

        foreach($data as $driver)
        {
            file_put_contents('./report.txt', implode(' | ',$driver) . "\n" , FILE_APPEND); 
        }

    
    } 
} 