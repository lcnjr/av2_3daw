<html>
<head>
<meta charset="UTF-8" />
</head>
<body>

<h1>Aluguel de Carros</h1>
<?php
require_once('conexao.php');
$conn = createCon();	

if(isset($_POST['btn2'])) { 

    if((isset($_POST['card'])) && (isset($_POST['nome'])) 
    ){
        echo "<script type='text/javascript'>alert('Aluguel finalizado com sucesso');</script>";
        header('Location:index.php');        


   } 
?>

<form method="POST">
<label for="fname">numero cartão:</label>
<input type="text" id="card" name="card" required><br>
<label for="fname">Nome:</label>
<input type="text" id="nome" name="nome" required><br>
<input type="submit" value="Finalizar Aluguel" name="btn2" />

</form>
</body>
<?php 
closeCon($conn);
?>
</html>