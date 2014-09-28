<?php include "header.html";?>
<?php include "libreria.php";?>
<table style="border: 3px solid black; width:800px; background-image: url(sfondi/nuvole.jpg);border: 3px solid black;" align="center" background="&#8221;nuvole.jpg&#8221;" cellpadding="0" cellspacing="0">
<tr>
<?php include "menu.html";?>
      <td style="border: 1px solid black;background-color: rgb(238, 238, 238); height: 200px; width: 700px; vertical-align: top; color: rgb(249, 57, 6);">
<!-- Form di Registrazione dati del Nodo -->
			   <h3 style="text-align: center;" >Elenco dei Nodi</h3>
				<table border="1" style="width:60%; color: blue;" align="center">
<?php
//		echo "<tr style=".'"text-align: center; color:black;"'."> <td>Nome</td> <td>IP Antenna</td><td>IP Manutenzione</td> <td>Interfaccia</td><td>Registrato</td></tr>";
		$db = new DBclass();
		$db->connetti();
		$nodi = $db->estrai_record("nodi",array ("nome","ip_wifi","ip_man","interface","creato","attivo","registrato"));
//		echo var_dump($nodi),mysql_num_rows($nodi);
		if (mysql_num_rows($nodi) > 0){
			while ($row = mysql_fetch_array($nodi)){
				echo "<tr style=".'"text-align: center; color:black;"'."><td >Nome</td><td style=".'"text-align: center; color:green;"'.">".$row['nome']."</td></tr>";
				echo "<tr style=".'"text-align: center; color:black;"'."><td >IP WiFi</td><td style=".'"text-align: left; color:blue;"'.">".$row['ip_wifi']."</td></tr>";
				echo "<tr style=".'"text-align: center; color:black;"'."><td >IP Manutenzione</td><td style=".'"text-align: left; color:blue;"'.">".$row['ip_man']."</td></tr>";
				echo "<tr style=".'"text-align: center; color:black;"'."><td >Interfaccia</td><td style=".'"text-align: left; color:blue;"'.">".$row['interface']."</td></tr>";
				echo "<tr style=".'"text-align: center; color:black;"'."><td >Registrato il</td><td style=".'"text-align: left; color:blue;"'.">".$row['creato']."</td></tr>";
				echo "<tr style=".'"text-align: center;background-color:black;"'."><td ></td><td style=".'"text-align: left; color:blue;"'.">"."</td></tr>";
//				echo "<br>";
//				echo "<tr> <td>".$row['nome']."</td> <td>".$row['ip_wifi']."</td><td>".$row['ip_man']."</td> <td>".$row['interface']."</td><td>".$row['creato']."</td></tr>";
			}				
		}
		$db->disconnetti();

?>
				</table>
	   </td>
 </tr>
<?php include "footer.html";?>

