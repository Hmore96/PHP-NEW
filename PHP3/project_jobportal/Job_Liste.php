<?php 
include "setup.php";
ist_eingeloggt();

use Markus\project_jobportal\Jobs;
include "kopf.php";

echo "<h1 class='main-h1'>Aktuelle Job Inserate</h1>";

    $jobs = new Jobs();
    $alle_jobs = $jobs->alle_jobs(); // gibt "Fahrzeug-Objekte als Array zurückt

echo "<div class='job-area'>";
    foreach($alle_jobs as $job) {
        echo "<div class='jobwrapper'>";
        echo "<div class='titel'>" . $job->titel . "</div>";
        echo "<br>";
        echo "<div class='beschreibung'>" . $job->beschreibung . "</div>";
        echo "<br>";
        echo "<div class='tags'>";
        echo "<div class='anstellungsart'>" . $job->anstellungsart . "</div>";
        echo "<br>";
        echo "<div class='gehalt'> ab " . $job->gehalt . "€ p.a </div>";
        echo "<br>";
        echo "<div class='kategorie'>" . $job->kategorie . "</div>";
        echo "<br>";
        echo "</div>";
        echo "</div>";
    }
    
echo "</div>";
    



include "fuss.php";