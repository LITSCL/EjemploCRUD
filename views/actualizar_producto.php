<?php require_once '../models/dao/CategoriaDAO.php'; ?>
<?php require_once '../models/dao/ProductoDAO.php'; ?>

<?php 
$daoCategoria = new CategoriaDAO();
$categorias = $daoCategoria->getAll();

$daoProducto = new ProductoDAO();
$producto = $daoProducto->find($_GET["id"])->fetch_object();
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
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
	<h1>Update</h1>
	<h3>Permite actualizar un registro</h3>
	
	<form action="actualizar_producto.php" method="GET">
		<input type="text" name="id" placeholder="ID producto a modificar" required/>
		<input type="submit" value="Modificar Formulario"/>
	</form>
	
	<hr/>
	
	<form action="../controllers/ProductoControlador.php" method="GET">
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" value="<?=$producto->id?>" readonly/></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?=$producto->nombre?>"/></td>
			</tr>
			<tr>
				<td>Descripción</td>
				<td><input type="text" name="descripcion" value="<?=$producto->descripcion?>"/></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td><input type="number" name="precio" value="<?=$producto->precio?>"/></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td><input type="number" name="stock" value="<?=$producto->stock?>"/></td>
			</tr>
			<tr>
				<td>Imagen</td>
				<td><input type="text" name="imagen" value="<?=$producto->imagen?>"/></td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoria">
					<?php 
					while ($categoria = $categorias->fetch_object()):
					?>
						<option value="<?=$categoria->id?>" <?=($categoria->id == $producto->categoria_id ? "selected" : "")?>><?=$categoria->nombre?></option>
					<?php 
					endwhile;
					?>
					</select>
				</td>
			</tr>
		</table>
		<button type="submit" name="opcion" value="2">Ejecutar Método</button>
	</form>
</body>
</html>