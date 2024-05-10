<?php 

namespace Markus\project_jobportal;

use Markus\project_jobportal\Job;
use Markus\project_jobportal\Mysql;

class Jobs
{
    public function alle_jobs(): array
    {
        $alle_jobs = array();
        $db =  Mysql::getInstanz();
        $ergebnis = $db->query("SELECT * FROM job_attribute ORDER BY titel ASC");
        while ($row = $ergebnis->fetch_assoc()) {
            $alle_jobs[] = new Job($row);
        }
        return $alle_jobs;
    }
}