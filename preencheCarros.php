<?php
require_once('conexao.php');
$conn = createCon();	

$cidade =  $_POST['cid'] ;
$sql = "SELECT idcarro,modelo FROM carro where alugado = 0 and cidade ='".$cidade."'"; 
	$resultado = $conn->query($sql);
	
	/* if ($resultado->num_rows > 0) { */
       
		if ($resultado->num_rows > 0) {
			while ($linha = mysqli_fetch_assoc($resultado)) {
            $id =  $linha["idcarro"];
            $modelo = $linha["modelo"];

			echo "<option value='$id'>$modelo </OPTION>";		 
         }
        } 
	// } else {
    //     echo "<script type='text/javascript'>alert('Sem carros cadastrado');</script>";
    //     echo "<option value= 'vazio'>vazio</OPTION>";	
	// }
 



closeCon($conn);
?>