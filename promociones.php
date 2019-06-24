<?php
session_start();
include 'bloquear.php';
?>

<?php
 include 'conexion.php';
 $sentencia= oci_parse($db,"SELECT * FROM modelo where id_catalogo = 22");
 oci_execute($sentencia);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="prefix.js"></script>
    <title>Promociones</title>
</head>
<body>
<div class="contenedor">
        <?php include 'cabecera.php' ?>
        
        <section class="main">
        <h1>Ultimas Novedades</h1>
        <?php while(($n = oci_fetch_assoc($sentencia))!=false){ ?>
        <div class="prod">
                <div class="imagen"><img src="<?php echo $n["IMAGEN"] ?>" alt="" height="256" width="280"></div>
                <div class="nombrep"><?php echo $n["NOMBRE_MODELO"] ?></div>

                <div class="comprar">
                    <div class="precio"> <p> S/ <?php echo $n["PRECIO"] ?> </p></div>
                    <form action="comprar.php" method="get">
                    <input  type="hidden" name="id"  value="<?php echo $n["MODELO_ID"] ?>" >                
                    <button type="submit" id="comprar">Comprar</button>
                    </form>
                </div>
        </div>
        <?php } ?>
        
        </section>
        
        <?php include 'footer.php' ?>
    </div>
</body>
</html>