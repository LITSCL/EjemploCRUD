<?php require_once '../models/dao/ProductoDAO.php'; ?>

<?php 
if (isset($_GET["sql"])) {
    $daoProducto = new ProductoDAO();
    $productos = $daoProducto->customQuery($_GET["sql"]);
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
	<h1>CustomQuery</h1>
	<h3>Permite entregar por parámetro una sentencia SQL, por lo cual la sentencia se establece en el controlador del modelo</h3>
	<h4>NOTA: Se debe utilizar para vistas que necesitan una consulta muy avanzada o que simplemente retorna columnas que no están en el modelo, como por ejemplo: <strong style="color: red">SELECT AVG(precio) AS "avg_precio" FROM producto</strong></h4>
	<form action="ejecutar_query_personalizada.php" method="GET">
		<label for="sql">SQL</label>
		<input type="text" name="sql" required/>
		<input type="submit" value="Ejecutar Método"/>
	</form>
	<h4>Resultado de la Query:</h4>
    <?php 
    if (isset($_GET["sql"])) {
        var_dump($productos->fetch_object()); 
    }
    ?>	
</body>
</html>