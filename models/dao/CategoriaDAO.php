<?php require_once '../config/database.php'; ?> 

<?php 
class CategoriaDAO {
    public $db;
    
    public function __construct() {
        $this->db = Database::conectar(); 
    }
    
    public function save(Categoria $c) {
        $nombre = $this->db->real_escape_string($c->getNombre());
        $query = $this->db->query("INSERT INTO categoria VALUES(null, '$nombre')");
        return $query;
    }
    
    public function getAll() {
        $query = $this->db->query("SELECT * FROM categoria");
        return $query;
    }
    
    public function customQuery($sql) {
        $query = $this->db->query($sql);
        return $query;
    }
}
?>