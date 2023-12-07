<?php require_once '../config/database.php'; ?>

<?php 
class ProductoDAO {
    public $db;
    
    public function __construct() {
        $this->db = Database::conectar();
    }
    
    public function save(Producto $p) {
        $nombre = $this->db->real_escape_string($p->getNombre());
        $descripcion = $this->db->real_escape_string($p->getDescripcion());
        $precio = $this->db->real_escape_string($p->getPrecio());
        $stock = $this->db->real_escape_string($p->getStock());
        $imagen = $this->db->real_escape_string($p->getImagen());
        $categoria = $this->db->real_escape_string($p->getCategoriaFK());
        
        $query = $this->db->query("INSERT INTO producto VALUES(null, '{$nombre}', '{$descripcion}', {$precio}, {$stock}, '{$imagen}', '{$categoria}')");
        return $query;
    }
    
    public function getAll() {
        $query = $this->db->query("SELECT * FROM producto");
        return $query;
    }
    
    public function getAllFK($columnaCategoria) { //Las columnas deben ingresarse en el orden de la base de datos y deben ser opcionales, en caso de que sean falsos se le asigna un valor por defecto (La clave primaria de la tabla agena).
        if ($columnaCategoria == false) {
            $columnaCategoria = "id";
        }
        
        $query = $this->db->query("SELECT producto.id, producto.nombre, producto.descripcion, producto.precio, producto.stock, producto.imagen, categoria.{$columnaCategoria} AS 'categoria_{$columnaCategoria}' FROM producto, categoria WHERE producto.categoria_id = categoria.id");
        return $query;
    }
    
    public function getRandom($limite) {
        $query = $this->db->query("SELECT * FROM producto ORDER BY RAND() LIMIT {$limite}");
        return $query;
    }
    
    public function getRandomFK($columnaCategoria, $limite) { //Las columnas deben ingresarse en el orden de la base de datos y deben ser opcionales, en caso de que sean falsos se le asigna un valor por defecto (La clave primaria de la tabla agena).
        if ($columnaCategoria == false) {
            $columnaCategoria = "id";
        }
        
        $query = $this->db->query("SELECT producto.id, producto.nombre, producto.descripcion, producto.precio, producto.stock, producto.imagen, categoria.{$columnaCategoria} AS 'categoria_{$columnaCategoria}' FROM producto, categoria WHERE producto.categoria_id = categoria.id ORDER BY RAND() LIMIT {$limite}");
        return $query;
    }
    
    public function find($id) {
        $query = $this->db->query("SELECT * FROM producto WHERE id = {$id}");
        return $query;
    }
    
    public function findFK($columnaCategoria, $id) { //Las columnas deben ingresarse en el orden de la base de datos y deben ser opcionales, en caso de que sean falsos se le asigna un valor por defecto (La clave primaria de la tabla agena).
        if ($columnaCategoria == false) {
            $columnaCategoria = "id";
        }
        
        $query = $this->db->query("SELECT producto.id, producto.nombre, producto.descripcion, producto.precio, producto.stock, producto.imagen, categoria.{$columnaCategoria} AS 'categoria_{$columnaCategoria}' FROM producto, categoria WHERE producto.categoria_id = categoria.id AND producto.id = {$id}");
        return $query;
    }
    
    public function findAll($columna, $valor) {       
        $query = $this->db->query("SELECT * FROM producto WHERE {$columna} = '{$valor}'");
        return $query;
    }
    
    public function findAllFK($columnaCategoria, $columna, $valor) { //Las columnas deben ingresarse en el orden de la base de datos y deben ser opcionales, en caso de que sean falsos se le asigna un valor por defecto (La clave primaria de la tabla agena).
        if ($columnaCategoria == false) {
            $columnaCategoria = "id";
        }
        
        $query = $this->db->query("SELECT producto.id, producto.nombre, producto.descripcion, producto.precio, producto.stock, producto.imagen, categoria.{$columnaCategoria} AS 'categoria_{$columnaCategoria}' FROM producto, categoria WHERE producto.categoria_id = categoria.id AND producto.{$columna} = {$valor}");
        return $query;
    }
    
    public function update(Producto $p) {
        $id = $this->db->real_escape_string($p->getId());
        $nombre = $this->db->real_escape_string($p->getNombre());
        $descripcion = $this->db->real_escape_string($p->getDescripcion());
        $precio = $this->db->real_escape_string($p->getPrecio());
        $stock = $this->db->real_escape_string($p->getStock());
        $imagen = $this->db->real_escape_string($p->getImagen());
        $categoria = $this->db->real_escape_string($p->getCategoriaFK());
        
        $query = $this->db->query("UPDATE producto SET nombre = '{$nombre}', descripcion = '{$descripcion}', precio = {$precio}, stock = {$stock}, imagen = '{$imagen}', categoria_id = {$categoria} WHERE id = {$id}");
        return $query;
    }
    
    public function delete($id) {
        $query = $this->db->query("DELETE FROM producto WHERE id = {$id}");
        return $query;
    }
    
    public function customQuery($sql) {
        $query = $this->db->query($sql);
        return $query;
    }
}
?>