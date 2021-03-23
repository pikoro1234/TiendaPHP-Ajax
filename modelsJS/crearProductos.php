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


echo "las foto  en variables: ".$foto1."<br>".$foto2."<br>".$foto3;






?>