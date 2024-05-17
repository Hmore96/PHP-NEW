<?php 
namespace Markus\project_jobportal;

include "setup.php";

use Markus\project_jobportal\Mysql;
use Markus\project_jobportal\Validieren;
use Markus\project_jobportal\Jobs;
use Markus\project_jobportal\JobRowAbstract;
include "kopf.php";


$erfolg = false;

if(!empty($_POST))  {
    $validieren = new Validieren();

    $validieren->ist_ausgefuellt($_POST["titel"], "Titel");
    $validieren->ist_ausgefuellt($_POST["beschreibung"], "Beschreibung");
    $validieren->ist_ausgefuellt($_POST["anstellungsart"], "Anstellungsgart");
    $validieren->ist_ausgefuellt($_POST["gehalt"], "Gehalt");
    $validieren->ist_ausgefuellt($_POST["kategorie"], "Kategorie");
    $validieren->ist_ausgefuellt($_POST["ort"], "Ort");
    $validieren->ist_ausgefuellt($_POST["link"], "Link");


    if(!$validieren->fehler_aufgetreten()){
        //speichern
        $job = new Job(array(
            "job_id" => $_GET["id"] ?? null, // wenn ID vorhanden, dann verwenden, sonst den rechten Wert (null)
            "titel" => $_POST["titel"],
            "beschreibung" => $_POST["beschreibung"],
            "anstellungsart" => $_POST["anstellungsart"],
            "gehalt" => $_POST["gehalt"],
            "kategorie" => $_POST["kategorie"],
            "ort" => $_POST["ort"],
            "link" => $_POST["link"]
        ));
        $job->speichern();
        $erfolg = true;
    }
}

echo "<h1>Inserate bearbeiten</h1>";

if($erfolg) {
    echo "<p><strong>Inserat wurde gespeichert</strong><br>
    <a href='admin_dashboard.php'>Zurück zur Liste</a></p>";
}

echo "<p><a href='jobs_bearbeiten.php'>Neues Inserat aufgeben></a></p>";

if(!empty($validieren)) {
    echo $validieren->fehler_html();
}

if(!empty($_GET["id"])) {
    //bearbeiten modus-Fahrzeugdaten ermitteln zum Formular vorausfüllen
    $job = new Jobs($_GET["id"]);

}

?>

<form action="jobs_bearbeiten.php
    <?php 
    if(!empty($job)) {
        echo "?id=" . $job->job_id;
    }
    ?>" method="post">
    
    <div>
        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" placeholder="Designer.." value="<?php 
        if(!empty($_POST["titel"])) {
            echo htmlspecialchars($_POST["titel"]);
        } elseif (!empty($job)) {
            echo htmlspecialchars($job->titel);
        }
        ?>">
    </div>
    <div>
        <label for="beschreibung">Beschreibung:</label>
        <input type="text" name="beschreibung" id="beschreibung" placeholder="..." value="<?php 
        if(!empty($_POST["beschreibung"])) {
            echo htmlspecialchars($_POST["beschreibung"]);
        } elseif (!empty($job)) {
            echo htmlspecialchars($job->beschreibung);
        }
        ?>">
    </div>
    <div>
        <label for="anstellungsart">Anstellungsgart:</label>
        <input type="anstellungsart" name="anstellungsart" id="anstellungsart" placeholder="voll/teilzeit" value="<?php 
        if(!empty($_POST["anstellungsart"])) {
            echo htmlspecialchars($_POST["anstellungsart"]);
        } elseif (!empty($job)) {
            echo htmlspecialchars($job->anstellungsart);
        }
        ?>">
    </div>
    <div>
        <label for="gehalt">Gehalt:</label>
        <input type="gehalt" name="gehalt" id="gehalt" placeholder="50000" value="<?php 
        if(!empty($_POST["gehalt"])) {
            echo htmlspecialchars($_POST["gehalt"]);
        } elseif (!empty($job)) {
            echo htmlspecialchars($job->gehalt);
        }
        ?>">
    </div>
    <div>
        <button type="submit">Fahrzeug speichern</button>
    </div>
</form>