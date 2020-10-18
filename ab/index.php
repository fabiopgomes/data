<?php
    include_once 'connect-acervo.php';
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>ANABOLIZANTES SONOROS - 0.1</title>
  <meta charset="utf-8" />
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
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="cadastro.php">Cadastro</a></li>
          <li><a href="page.php">Listagem</a></li>
          <li><a href="controle-audicoes.php">Audições</a></li>
          <li><a href="contact.html">Fale comigo</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Últimas aquisições</h3>
        <h4>Ao vivo/Virtual</h4>
        <h5>Data...</h5>
        Nome do álbum.<br>
        Nome do álbum.<br>
        Nome do álbum.<br>
        Nome do álbum.<br>
        
        <h3>Buscar</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h2><b>Bem vindo ao meu acervo musical</b></h2>
        <h1><b>Cinco dicas de audição para hoje:</b>  <br><br>
          <?php
            //$sql = "select artista, nomeAlbum, ano, pais, genero from vinil union select artista, nomeAlbum, ano, pais, genero from cd";
            $sql = "select codigo, artista, nomeAlbum FROM vinil union select codigo, artista, nomeAlbum FROM cd ORDER BY RAND() LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 /*echo $row["artista"]." - " . $row["nomeAlbum"]. " - "."  " . $row["ano"]. " - "." - " . $row["pais"].
                    " - " . $row["genero"]."<br>";*/
                  echo $row["codigo"].": ".$row["artista"]." - " . $row["nomeAlbum"]."<br>";
            }
            } else {
                echo "0 results";
            }
          ?>
          </h1>
      </div>
    </div>
  </div>
</body>
</html>
