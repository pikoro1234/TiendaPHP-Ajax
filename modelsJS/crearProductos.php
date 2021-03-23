<?php

$foto1 = $_FILES['image1']['name'];

if (isset($_FILES['image2']['name'])) {

    $foto2 = $_FILES['image2']['name'];

}else{

    $foto2 = "nofoto.png";
}

if (isset($_FILES['image3']['name'])) {
    
    $foto3 = $_FILES['image3']['name'];

}else{

    $foto3 = "nofoto.png";
}


$usuario = $_POST['userNick'];

$nombreProducto = $_POST['nombreProducto'];

$precioProducto=$_POST['precioProducto'];

$descripcionProducto=$_POST['descripcionProducto'];

$pesoProducto=$_POST['pesoProducto'];

$dimensionProducto=$_POST['dimensionProducto'];

$marcaProducto=$_POST['marcaProducto'];

$colorProducto=$_POST['colorProducto'];

$envaseProducto=$_POST['envaseProducto'];

$categoriaProducto=$_POST['categoriaProducto'];

$estadoProducto=$_POST['estadoProducto'];



echo "las foto  en variables: ".$foto1."<br>".$foto2."<br>".$foto3." el usuario es ".$usuario."--".$nombreProducto
."--".$precioProducto."--".$descripcionProducto."--".$pesoProducto."--".$dimensionProducto."--".$marcaProducto
."--".$colorProducto."--".$envaseProducto."--".$categoriaProducto."--".$estadoProducto;






?>