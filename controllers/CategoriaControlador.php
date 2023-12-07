<?php
class CategoriaControlador {
    
    public function controlador() {
        require_once '../models/dto/Categoria.php';
        require_once '../models/dao/CategoriaDAO.php';
        
        switch ($_GET["opcion"]) {
            case "1": //Crear.
                $daoCategoria = new CategoriaDAO();             
                $c = new Categoria();
                $c->setNombre($_GET["nombre"]); 
                $daoCategoria->save($c);  
                header("Location: " . "../index.php");
                break;
            default:
                return "No existe la opción";
        }
    }
    
}

if (isset($_GET["opcion"])) {
    session_start();
    $cc = new CategoriaControlador();
    $cc->controlador();  
}
?>