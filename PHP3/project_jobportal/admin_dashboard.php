<?php 
    include "kopf.php";
    
    include "setup.php";
    ist_eingeloggt();

 ?>
 
 <h1>Admin Dashboard</h1>
    <p>Was möchtest du tun?</p>
 <body>
    <div class="button-wrapper">
    <div class="button-wrapper">
        <button type="button" class="button1" onclick="window.location='admin.php'">Inserate verwalten</button>
        <button type="button" class="button2" onclick="window.location='admin.php'">Neues Inserat aufgeben</button>
    </div>

    </div>
 </body>

    

<?php
    include "fuss.php";


?>