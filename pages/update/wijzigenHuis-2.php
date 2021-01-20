  <?php
  include "/opt/lampp/htdocs/makelaar-php/config.php";
  $form = $_POST['form'];

  $idHuis = $form['idHuis'];
  $dinges = prepared_update($conn, "Huis", $idHuis, $form);

  echo "<pre>";
  var_dump($dinges);
  echo "</pre>";
  die('end of script');

  // geef een bevestiging dat de velden zijn gerwijzigd
  // haal de last insert id op 

  ?>

  <body>
    <div class="container">

      <h2 class="mt ml" style="margin-left:0.5em">Wijzig huis ID:
        <b>
        </b>toe
      </h2>



  </body>