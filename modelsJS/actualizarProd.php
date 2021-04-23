<?php

echo "aqui el archivo actualizar js";


 /* ACTUALIZAMOS EL PRODUCTO YA COMPROBADO */ // ---  USO DE PDO
    /* function actualizarMiProducto($conPDO, $id, $nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado){

        try {

            $sql = "UPDATE  producto SET nombre = ?, precio = ?, descripcion = ?, peso = ?, dimension = ?, marca= ?, color = ?, envase = ?, categoria = ?, estado = ? WHERE id = ? LIMIT 1";

            $statement = $conPDO->prepare($sql);

            $statement->execute(array($nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado,$id));

            if ($statement->rowCount() > 0) {
                
                return true;
            }

        } catch (PDOException $e) {
            
            die($e->getMessage());
        }  */
        
        /* consulta UPDATE  producto SET descripcion = 'descripcion actualizada', marca='la zanahoria' WHERE id = 49 LIMIT 1*/

       //return $nombre."<br>".$precio."<br>".$descripcion."<br>".$peso."<br>".$dimension."<br>".$marca."<br>".$color."<br>".$envase."<br>".$categoria."<br>".$estado;
    //}



?>