<?php 
namespace Markus\project_jobportal;

include "setup.php";

use Markus\project_jobportal\Mysql;
use Markus\project_jobportal\Validieren;
use Markus\project_jobportal\Jobs;
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
            "job_id" => $_GET["job_id"] ?? null, // wenn ID vorhanden, dann verwenden, sonst den rechten Wert (null)
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

if(!empty($_GET["job_id"])) {
    //bearbeiten modus-Fahrzeugdaten ermitteln zum Formular vorausfüllen
    $job = new Job($_GET["job_id"]);

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
            echo htmlspecialchars($_POST(["titel"]));
        } elseif (!empty($job)) {
            echo htmlspecialchars($job->titel);
        }
        ?>">
    </div>
    <div>
        <label for="beschreibung">Beschreibung:</label>
        <select name="marken_id" id="marken_id">
            <option value="">-Bitte wählen-</option>
            <?php
            $marken = new Marken(); 
            $alle_marken = $marken->alle_marken();
            foreach ($alle_marken as $marke) {
                echo "<option value='{$marke->id}'" ;
                if(!empty($_POST["marken_id"]) && $_POST["marken_id"] == $marken->id) 
                {
                    echo " selected";
                } 
                else if (!empty($fahrzeug) && $fahrzeug->marken_id == $marke->id) 
                {
                    echo " selected";
                }

                echo ">{$marke->hersteller}</option>";

            }
            
            ?>
        </select>
    </div>
    <div>
        <label for="farbe">Farbe:</label>
        <input type="text" name="farbe" id="farbe" placeholder="Pearlwhite" value="<?php 
        if(!empty($_POST["farbe"])) {
            echo htmlspecialchars($_POST(["farbe"]));
        } elseif (!empty($fahrzeug)) {
            echo htmlspecialchars($fahrzeug->farbe);
        }
        ?>">
    </div>
    <div>
        <label for="baujahr">Baujahr:</label>
        <input type="number" name="baujahr" id="baujahr" placeholder="2002" value="<?php 
        if(!empty($_POST["baujahr"])) {
            echo htmlspecialchars($_POST(["baujahr"]));
        } elseif (!empty($fahrzeug)) {
            echo htmlspecialchars($fahrzeug->baujahr);
        }
        ?>">
    </div>
    <div>
        <button type="submit">Fahrzeug speichern</button>
    </div>



</form>