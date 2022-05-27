<?php session_start(); 
if(isset($_SESSION['carrito'])){
$carrito_mio=$_SESSION['carrito'];
}
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
        if(isset($carrito_mio[$i])){
        if($carrito_mio[$i]!=NULL){ 
        if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{ $carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
        $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    if(!isset($totalcantidad)){$totalcantidad = '0';}else{ $totalcantidad = $totalcantidad;}
    $totalcantidad += $total_cantidad;
    }}}
}
     if(!isset($totalcantidad)){$totalcantidad = '';}else{ $totalcantidad = $totalcantidad;}
?>
<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare('SELECT ID_Comics, Titulo_Comic, precio_comic, img_comics FROM productos WHERE activo=1');
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba-DB</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/comics.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <header class="header">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="logo">
                    </div>
                    <button type="button" class="nav-toggler">
               <span></span>
            </button>
                    <  <nav class="nav">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="./Noticias/Noticias.html">NEWS</a></li>
                            <li><a href="./comics.php">COMICS</a></li>
                            <li><a href="./index.html">INICIO</a></li>
                            <li><a href="#" class="active">SOPORTE</a></li>
                            <li><a href="./log_home.php">REGISTRO</a></li>
                            <li><a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: white; cursor:pointer;"><i class="fa fa-shopping-cart" style="font: size 48px;" ></i><?php echo $totalcantidad; ?>
</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
                 
              </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <header>
    <!--AQUI VA LA NAVBAR RESPONSIVE IMPLEMENTADA-->
    <div class="animated">
        <main>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php 
                                $id = $row['ID_Comics'];
                                $imagen = $row['img_comics'];
                                if (!file_exists($imagen))[
                                    $imagen = "img/no-foto.jpg"
                                    ]
                            ?>
                            <img class="img" src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-tittle"><?php echo $row['Titulo_Comic']; ?></h5>
                                <p class="card-text">€<?php echo $row['precio_comic']; ?></p>
                                <form id="formulario" name="formulario" method="post" action="cart.php">
                                    <a href="details.php?id=<?php echo $row['ID_Comics']; ?>" class="btn btn-primary">Detalles</a>
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <input name="ref" type="hidden" id="ref" value="<?php echo $row['ID_Comics']; ?>">
                                    <input name="precio" type="hidden" id="precio" value="<?php echo $row['precio_comic']; ?>">
                                    <input name="titulo" type="hidden" id="titulo" value="<?php echo $row['Titulo_Comic']; ?>">
                                    <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2">
                                    </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </div>
        </main>
        <?php
        include("./modal_cart.php"); 
        ?>
    </body>

    </html>