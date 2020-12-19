<html>
<head>
<meta charset="UTF-8" />
</head>
<body>

<h1>Aluguel de Carros</h1>
<?php
require_once('conexao.php');
$conn = createCon();	

if(isset($_POST['btn'])) { 

    if((isset($_POST['selectCarro'])) && (isset($_POST['selectLoja'])) 
    && (isset($_POST['dataInicio']))  && (isset($_POST['dataFim'])) 
    && (isset($_POST['cpf'])) ){
        $cpf = $_POST['cpf'];
		$carro= $_POST['selectCarro'];
        $loja =$_POST['selectLoja'];
        $dataInicio =$_POST['dataInicio'];
        $dataFim =$_POST['dataFim'];
        $date1=date("Y-m-d H:i:s",strtotime($dataInicio));
        $date2=date("Y-m-d H:i:s",strtotime($dataFim));
       
        
       
                $sql = "INSERT into alocacao(CPF_cliente,dataInicio,dataFim,lojaRetirada,carro)	values ('" . $cpf . "','" . $date1. "',' 
                " . $date2. "', " . $loja. ", " . $carro. ")"; 
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>alert('inserido');</script> " ;
                    header('Location:finalizar.php');


                } else {
                    echo $sql;
                    echo $conn->error;
                    echo "<script type='text/javascript'>alert('Falha ao inserir');</script>" ;
                    
                }
        


    }
	
} 
?>

<form method="POST">
<label for="fname">CPF:</label>
<input type="text" id="cpf" name="cpf" required><br>
<label for="cidade">Cidade:</label>
<select name="cidade" id="cidade" required>
  <option value="Belford Roxo">Belford Roxo </option>
  <option value="Rio de Janeiro">Rio de Janeiro</option>
  <option value="São João de Meriti">São João de Meriti</option>
  <option value="Nova iguaçu">Nova iguaçu</option>
</select><br>


<label for="carros">Escolha O Carro:</label>
<select name="selectCarro" required>
<?php
	$sql = "SELECT idcarro,modelo FROM carro where alugado = 0"; 
	$resultado = $conn->query($sql);
	
	/* if ($resultado->num_rows > 0) { */
       
		if ($resultado->num_rows > 0) {
			while ($linha = mysqli_fetch_assoc($resultado)) {
            $id =  $linha["idcarro"];
            $modelo = $linha["modelo"];

			echo "<option value='$id'>$modelo </OPTION>";		 
		 } 
	} else {
        echo "<script type='text/javascript'>alert('Sem carros cadastrado');</script>";
        echo "<option value= 'vazio'>vazio</OPTION>";	
	}
 
    

?>
 
</select>
<br>

<label for="loja">Loja para Retirada</label>
<select name="selectLoja" required>
<?php
	$sql = "SELECT idloja, nome FROM loja"; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
        $idloja =  $linha["idloja"];
        $nomeloja = $linha["nome"];

        echo "<option value='$idloja'>$nomeloja </OPTION>";		 
     } 
} else {
    echo "<script type='text/javascript'>alert('Sem Lojas');</script>";
    echo "<option value= 'vazio'>vazio</OPTION>";	
}

 
    

?>
 
</select>
<br>
<label for="dataInicio">Data de retirada:</label>
<input type="date" id="dataInicio" name="dataInicio" required>
<br>
<label for="dataFim">Data de Devolução:</label>
<input type="date" id="dataFim" name="dataFim" required>
<br>
<input type="submit" value="Finalizar" name="btn" />
</form>
</body>
<?php 
closeCon($conn);
?>
</html>