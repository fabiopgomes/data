<?php

            $servername = "localhost";
            $database = "acervo";
            $username = "usuario_acervo";
            $password = "acervo";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
            }
	     	
	    /*$sql = "SELECT * FROM $tipo";
            $result = $conn->query($sql);
	
            if ($result->num_rows > 0) {
            // output data of each row
                echo "listando os CDs...<br>";
                while($row = $result->fetch_assoc()) {
                    
                    echo "codigo: " . $row["codigo"]. " - Nome da banda: " . $row["artista"]." - Nome do album: " . $row["nomeAlbum"]. " - "." ano: " . $row["ano"]. " - "." pais: " . $row["pais"].
                    " Gênero: " . $row["genero"]." Última audição: " . $row["ultAud"]."<br>";
                }
            } else {
                echo "0 results";
            }*/


        ?>
