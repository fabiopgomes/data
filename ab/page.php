<?php
    include_once 'connect-acervo.php';
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>ANABOLIZANTES SONOROS - 0.1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
           <h1><a href="index.php">Anabolizantes<span class="logo_colour">Sonoros</span></a></h1>
          <h2>Pedaços de mim em pedaços</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Home</a></li>
          <li><a href="examples.html">Examples</a></li>
          <li class="selected"><a href="page.php">Listagem</a></li>
          <li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <h4>New Website Launched</h4>
        <h5>August 1st, 2013</h5>
        <p>2013 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>New Website Launched</h4>
        <h5>August 1st, 2013</h5>
        <p>2013 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="#">lamet</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">aute 3</a></li>
          <li><a href="#">consequat 4</a></li>
        </ul>
        <h3>Search</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>A Page</h1>

          <?php
            $arrayNome = ["Artista"];
            $i=0;
            $arrayNome[$i] = "artista";
            $i++;
            $sql = "select artista from vinil union select artista from cd";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "listando os artistas...<br>";
                while($row = $result->fetch_assoc()) {
                    $arrayNome[$i] = $row["artista"];
                    $i++;
                }
            } else {
                echo "0 results";
            }


            $tipoCod = filter_input(INPUT_POST, "sltipo", FILTER_SANITIZE_NUMBER_INT);
            $tipo = "";
            if($tipoCod){ $tipo = $arrayNome[$tipoCod]; }

        ?>

        <form method="post">
            <ul>
                <li>Selecione a mídia: 
                    <select name="sltipo">
                        <?php
                        for ($i = 0; $i < count($arrayNome); $i++) {
                            ?>
                                <option value="<?= $i; ?>"><?= $arrayNome[$i]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </li>
                <li><input type="submit" name="btnSubmit" value="Listar" /></li>
            </ul>
        </form>
        <br /><hr/><br />
        <p>Artista selecionado: <?= $tipo; ?></p>
        
        <?php

            $sql = "select * from vinil where vinil.artista='$tipo' union select * from cd where cd.artista='$tipo'";
            

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
                echo "listando os itens...<br>";
                while($row = $result->fetch_assoc()) {
                    
                    echo $row["codigo"]. " - - ". $row["artista"]." - " . $row["nomeAlbum"]. " - "."  " . $row["ano"]. " - "." - " . $row["pais"].
                    " - " . $row["genero"]." Última audição: " . $row["ultAud"]."<br>";
                }
            } else {
                //echo "0 results";
            }
        
        ?>

       
      </div>
    </div>
  </div>
</body>
</html>
