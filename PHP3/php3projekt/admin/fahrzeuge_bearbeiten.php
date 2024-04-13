<?php 


include "setup.php";
ist_eingeloggt();

use WIFI\PHP3\Klassen\Validieren;
use WIFI\PHP3\Klassen\Model\Row\Fahrzeug;
use WIFI\PHP3\Klassen\Model\Marken;

include "kopf.php";


$erfolg = false;

if(!empty($_POST))  {
    $validieren = new Validieren();

    if($validieren->ist_ausgefuellt($_POST["kennzeichen"], "Kennzeichen")){
        $validieren->ist_kennzeichen($_POST["kennzeichen"], "Kennzeichen");
    }

    $validieren->ist_ausgefuellt($_POST["marken_id"], "Marke");
    $validieren->ist_ausgefuellt($_POST["farbe"], "Farbe");
    if($validieren->ist_ausgefuellt($_POST["baujahr"], "Baujahr")){
        $validieren->ist_jahr($_POST["baujahr"], "Baujahr");
    }

    if(!$validieren->fehler_aufgetreten()){
        //speichern
        $fahrzeug = new Fahrzeug(array(
            "id" => $_GET["id"] ?? null, // wenn ID vorhanden, dann verwenden, sonst den rechten Wert (null)
            "kennzeichen" => $_POST["kennzeichen"],
            "marken_id" => $_POST["marken_id"],
            "farbe" => $_POST["farbe"],
            "baujahr" => $_POST["baujahr"]
        ));
        $fahrzeug->speichern();
        $erfolg = true;
    }
}

echo "<h1>Fahrzeug bearbeiten</h1>";

if($erfolg) {
    echo "<p><strong>Fahrzeug wurde gespeichert</strong><br>
    <a href='fahrzeuge_liste.php'>Zurück zur Liste</a></p>";
}

echo "<p><a href='fahrzeuge_bearbeiten.php'>Neues Fahrzeug anlegen></a></p>";

if(!empty($validieren)) {
    echo $validieren->fehler_html();
}

if(!empty($_GET["id"])) {
    //bearbeiten modus-Fahrzeugdaten ermitteln zum Formular vorausfüllen
    $fahrzeug = new Fahrzeug($_GET["id"]);

}

?>

<form action="fahrzeuge_bearbeiten.php<?php 
    if(!empty($fahrzeug)) {
        echo "?id=" . $fahrzeug->id;
    }

?>" method="post">
    
    <div>
        <label for="kennzeichen">Kennzeichen:</label>
        <input type="text" name="kennzeichen" id="kennzeichen" placeholder="SL-555 OG" value="<?php 
        if(!empty($_POST["kennzeichen"])) {
            echo htmlspecialchars($_POST(["kennzeichen"]));
        } elseif (!empty($fahrzeug)) {
            echo htmlspecialchars($fahrzeug->kennzeichen);
        }
        ?>">
    </div>
    <div>
        <label for="marken_id">Marke:</label>
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




<?php
include "fuss.php";