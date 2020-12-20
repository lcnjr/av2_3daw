<?php
require_once('conexao.php');
$conn = createCon();	

$cidade =  $_POST['cid'] ;

	$sql = "SELECT idloja, nome FROM loja where cidade ='".$cidade."' "; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
        $idloja =  $linha["idloja"];
        $nomeloja = $linha["nome"];

        echo "<option value='$idloja'>$nomeloja </OPTION>";		 
     } 
    }


 
    



closeCon($conn);
?>