<?php require_once '../models/dao/ProductoDAO.php'; ?>

<?php 
if (isset($_GET["columnaCategoria"])) {
    $daoProducto = new ProductoDAO();
    $productos = $daoProducto->getAllFK($_GET["columnaCategoria"]);
}
else {
    $daoProducto = new ProductoDAO();
    $productos = $daoProducto->getAllFK(false);
}
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<ul>
		<li><a href="crear_categoria.php">Crear Categoria</a></li>
		<li><a href="crear_producto.php">Crear Producto (Save)</a></li>
		<li><a href="mostrar_productos.php">Mostrar Productos (GetAll)</a></li>
		<li><a href="mostrar_productos_alterando_la_fk.php?columnaCategoria=nombre">Mostrar Productos Alterando la FK (GetAllFK)</a></li>
		<li><a href="mostrar_productos_aleatorios.php?limite=3">Mostrar Productos Aleatorios (GetRandom)</a></li>
		<li><a href="mostrar_productos_aleatorios_alterando_la_fk.php?columnaCategoria=nombre&limite=3">Mostrar Productos Aleatorios Alterando la FK (GetRandomFK)</a></li>
		<li><a href="buscar_producto.php?id=1">Buscar Producto (Find)</a></li>
		<li><a href="buscar_producto_alterando_la_fk.php?columnaCategoria=nombre&id=6">Buscar Producto Alterando la FK (FindFK)</a></li>
		<li><a href="buscar_productos.php?columna=categoria_id&valor=2">Buscar Productos (FindAll)</a></li>
		<li><a href="buscar_productos_alterando_la_fk.php?columnaCategoria=nombre&columna=categoria_id&valor=2">Buscar Productos Alterando la FK (FindAllFK)</a></li>
		<li><a href="actualizar_producto.php?id=6">Actualizar Producto (Update)</a></li>
		<li><a href="borrar_producto.php">Borrar Producto (Delete)</a></li>
		<li><a href="ejecutar_query_personalizada.php">Ejecutar Query Personalizada (CustomQuery)</a></li>
	</ul>
	<h1>GetAllFK</h1>
	<h3>Permite obtener todos los registros, pero cambiando la clave foranea (Mostrar otra columna de la tabla agena, en lugar de su clave primaria), si no se entregan parámetros al método se muestran las claves primarias por defecto</h3>
    
    <form action="mostrar_productos_alterando_la_fk.php" method="GET">
		<label for="columnaCategoria">Columna Tabla Categoria</label>
		<input type="text" name="columnaCategoria" placeholder="Por defecto es: id"/>
		<input type="submit" value="Ejecutar Método"/>
	</form>
    
    <table border="1">
        <tr>
        	<th>ID</th>
        	<th>Nombre</th>
        	<th>Descripcion</th>
        	<th>Precio</th>
        	<th>Stock</th>
        	<th>Imagen</th>
        	<th>Categoria</th>
        </tr>
    <?php 
    while ($producto = $productos->fetch_object()):
    ?>
    	<tr>
    		<td><?=$producto->id?></td>
    		<td><?=$producto->nombre?></td>
    		<td><?=$producto->descripcion?></td>
    		<td><?=$producto->precio?></td>
    		<td><?=$producto->stock?></td>
    		<td><?=$producto->imagen?></td>
    		<?=!isset($_GET["columnaCategoria"]) ? "<td>" . $producto->categoria_id . "</td>" : false?>
    		<?=isset($_GET["columnaCategoria"]) && $_GET["columnaCategoria"] == "id" ? "<td>" . $producto->categoria_id . "</td>" : false?>
    		<?=isset($_GET["columnaCategoria"]) && $_GET["columnaCategoria"] == "nombre" ? "<td>" . $producto->categoria_nombre . "</td>" : false?>
    	</tr>  
    <?php 
    endwhile;
    ?>
    </table>
</body>
</html>