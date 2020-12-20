<html>
<head>
<meta charset="UTF-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                                 
                        $sql2 = "UPDATE `carro` SET `alugado` = '1' WHERE (`idcarro` = " . $carro. ")";                  
                    if ($conn->query($sql2) === TRUE) {
                        echo "<script type='text/javascript'>alert('inserido');</script> " ;
                        header('Location:finalizar.php');   
                
                    }else{
                        echo "<script type='text/javascript'>alert('Falha ao finalizar ');</script>" ;
                    
                    }
                   
                   


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
<select name="cidade" id="cidade"  required>
  <option value="Belford Roxo">Belford Roxo </option>
  <option value="Rio de Janeiro">Rio de Janeiro</option>
  <option value="São João de Meriti">São João de Meriti</option>
  <option value="Nova iguaçu">Nova iguaçu</option>
</select><br>


<label for="carros">Escolha O Carro:</label>
<select name="selectCarro" id = "selectCarro">
</select>
<br>

<label for="loja">Loja para Retirada</label>
<select name="selectLoja" id ="selectLoja"  required> 
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
<script>

  $('#cidade').on("change",function(){
      var cidade = $(this).val();
      $.ajax({
            url: 'preencheCarros.php',
            type: 'POST',
            data:{cid:cidade},
            beforeSend: function(){
               $('#selectCarro').html("carregando ...");

            },success:function (data){     
                      
                 $('#selectCarro').html(data);
            

            },error:function (data){
                 $('#selectCarro').html("Erro ao carregar os carros");

            }

      });
      $.ajax({
            url: 'preencheLoja.php',
            type: 'POST',
            data:{cid:cidade},
            beforeSend: function(){
               $('#selectLoja').html("carregando ...");

            },success:function (data){     
                        
                 $('#selectLoja').html(data);
            

            },error:function (data){
                 $('#selectLoja').html("Erro ao carregar os carros");

            }

      });
    
  });

</script>