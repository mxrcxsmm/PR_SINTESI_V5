<?php
require 'config/config.php';
require 'config/database.php';
$id_comic=$_REQUEST['id'];
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare('SELECT ID_Comics, Titulo_Comic, precio_comic, Descripcion_Comic, img_comics FROM productos WHERE activo=1 AND ID_Comics='.$id_comic);
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
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--AQUI VA LA NAVBAR RESPONSIVE IMPLEMENTADA-->
    <div>
        <header class="header">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="logo">
                        <a href="#">Comic & Manga</a>
                    </div>
                    <button type="button" class="nav-toggler">
               <span></span>
            </button>
                    <nav class="nav">
                        <ul>
                            <li><a href="#" class="active">HOME</a></li>
                            <li><a href="../Noticias/Noticias.html">NEWS</a></li>
                            <li><a href="../comics.php">COMICS</a></li>
                            <li><a href="../index.html">INICIO</a></li>
                            <li><a href="#">SOPORTE</a></li>
                            <li><a href="../">REGISTRO</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    </div>

    
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1">
                     <?php foreach ($resultado as $row) { ?>
                        <div id="img-comics" class="card shadow-sm">
                            
                            <?php 
                                $id = $row['ID_Comics'];
                                $imagen = $row['img_comics'];
                                if (!file_exists($imagen))[
                                    $imagen = "img/no-foto.jpg"
                                    ]
                            ?>
                            <img id="img2" src="<?php echo $imagen; ?>">
                        </div>

                    </div>
                    <div class="col-md-6 order-md-2 padding-div">
                        <h2><?php echo $row['Titulo_Comic']; ?></h2>
                        <h4><?php echo MONEDA . $row['precio_comic']; ?></h4>
                        <p class="lead">
                            <?php echo $row['Descripcion_Comic']; ?>
                        </p>
                        <div class="d-grid gap-3 col-10 mx-auto">
                            <button class="btn btn-primary" type="button">Comprar ahora</button>
                            <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>)">Agregar al carrito</button>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </main>
        <script>
            function addProducto(id){
                let url = 'clases/carrito.php';
                let formData = new FormData()
                formData.append('id', $id)

                fetch(url,{
                    method: 'POST',
                    body: formData,
                    mode: 'cros' 
                })
            }
        </script>
    </body>

    </html>
    