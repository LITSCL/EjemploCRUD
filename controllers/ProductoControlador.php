<?php
class ProductoControlador {
    
    public function controlador() {
        require_once '../models/dto/Producto.php';
        require_once '../models/dao/ProductoDAO.php';
        
        switch ($_GET["opcion"]) {
            case "1": //Crear.
                $daoProducto = new ProductoDAO();
                $p = new Producto();
                $p->setNombre($_GET["nombre"]);
                $p->setDescripcion($_GET["descripcion"]);
                $p->setPrecio($_GET["precio"]);
                $p->setStock($_GET["stock"]);
                $p->setImagen($_GET["imagen"]);
                $p->setCategoriaFK($_GET["categoria"]);
                $daoProducto->save($p);
                header("Location: " . "../index.php");
                break;
            case "2": //Modificar.
                $daoProducto = new ProductoDAO();
                $p = new Producto();
                $p->setId($_GET["id"]);
                $p->setNombre($_GET["nombre"]);
                $p->setDescripcion($_GET["descripcion"]);
                $p->setPrecio($_GET["precio"]);
                $p->setStock($_GET["stock"]);
                $p->setImagen($_GET["imagen"]);
                $p->setCategoriaFK($_GET["categoria"]);
                $daoProducto->update($p);
                header("Location: " . "../index.php");
                break;
            case "3": //Borrar.
                $daoProducto = new ProductoDAO();
                $daoProducto->delete($_GET["id"]);
                header("Location: " . "../index.php");
            default:
                return "No existe la opción";
        }
    }
    
}

if (isset($_GET["opcion"])) {
    session_start();
    $pc = new ProductoControlador();
    $pc->controlador();
}
?>