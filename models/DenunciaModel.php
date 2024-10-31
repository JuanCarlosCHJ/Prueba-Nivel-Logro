<?php
class Denuncia
{
    private $conn;
    private $table = 'denuncias';
    public $id;
    public $titulo;
    public $descripcion;
    public $ubicacion;
    public $ciudadano;
    public $fecha;
    public $estado;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' 
            SET titulo = :titulo, 
                descripcion = :descripcion, 
                ubicacion = :ubicacion, 
                ciudadano = :ciudadano,
                fecha = :fecha, 
                estado = :estado';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':ubicacion', $this->ubicacion);
        $stmt->bindParam(':ciudadano', $this->ciudadano);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':estado', $this->estado);

        return $stmt->execute();
    }

    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->titulo = $row['titulo'];
        $this->descripcion = $row['descripcion'];
        $this->ubicacion = $row['ubicacion'];
        $this->ciudadano = $row['ciudadano'];
        $this->fecha = $row['fecha'];
        $this->estado = $row['estado'];
        $this->created_at = $row['created_at'];

        return $this;
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . '
            SET titulo = :titulo, 
                descripcion = :descripcion, 
                ubicacion = :ubicacion, 
                ciudadano = :ciudadano,
                estado = :estado
            WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':ubicacion', $this->ubicacion);
        $stmt->bindParam(':ciudadano', $this->ciudadano);
        $stmt->bindParam(':estado', $this->estado);

        return $stmt->execute();
    }

    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function search($keyword)
    {
        $query = 'SELECT * FROM ' . $this->table . ' 
            WHERE titulo LIKE :keyword 
            OR descripcion LIKE :keyword 
            OR ubicacion LIKE :keyword 
            OR ciudadano LIKE :keyword
            ORDER BY fecha DESC';

        $stmt = $this->conn->prepare($query);
        $keyword = "%{$keyword}%";
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt;
    }
}
