<?php 
namespace Markus\project_jobportal;

include "setup.php";

use Markus\project_jobportal\Mysql;
use Markus\project_jobportal\Validieren;
use Markus\project_jobportal\Jobs;

include "kopf.php";

?>
 
<body>
    <h2>Willkommen, <?php echo $_SESSION["benutzername"];?></h2>
    <h1>Admin-Dashboard</h1>
    <h3>deine aktuellen Inserate auf JOBR</h3>
    <?php 
    $jobs = new Jobs();
    $alle_jobs = $jobs->benutzer_jobs(); // gibt "Job-Objekte als Array zurückt

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
        echo "<div class='button-area'>";
        echo "<br>";
        echo "<a href='jobs_bearbeiten.php?id={$job->job_id}'>Bearbeiten</a>" . "</td>";;
        echo "<br>";
        echo "</div>";
        echo "<div class='button-area'>";
        echo "<br>";
        echo "<button class='delete'>Löschen</button";
        echo "<br>";
        echo "</div>";
        echo "</div>";
    }
    
echo "</div>";
    ?>
</body>
    
<?php
include "fuss.php";
?>
