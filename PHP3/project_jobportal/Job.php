<?php

namespace Markus\project_jobportal;

 class Job extends JobRowAbstract 
 {
    protected string $tabelle = "job_attribute";

    public function get_job(): Job
    {
        return new Job($this->job_id);
    }
 }
