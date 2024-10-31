<?php
class DenunciaController
{
    private $denunciaModel;

    public function __construct($db)
    {
        $this->denunciaModel = new Denuncia($db);
    }

    public function index()
    {
        $result = $this->denunciaModel->read();
        include 'views/components/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->denunciaModel->titulo = $_POST['titulo'];
            $this->denunciaModel->descripcion = $_POST['descripcion'];
            $this->denunciaModel->ubicacion = $_POST['ubicacion'];
            $this->denunciaModel->ciudadano = $_POST['ciudadano'];
            $this->denunciaModel->fecha = date('Y-m-d');
            $this->denunciaModel->estado = 'Pendiente';

            if ($this->denunciaModel->create()) {
                header('Location: index.php');
            }
        }
        include 'views/components/create.php';
    }

    public function edit($id)
    {
        $this->denunciaModel->id = $id;
        $complaint = $this->denunciaModel->readOne();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->denunciaModel->titulo = $_POST['titulo'];
            $this->denunciaModel->descripcion = $_POST['descripcion'];
            $this->denunciaModel->ubicacion = $_POST['ubicacion'];
            $this->denunciaModel->ciudadano = $_POST['ciudadano'];
            $this->denunciaModel->estado = $_POST['estado'];

            if ($this->denunciaModel->update()) {
                header('Location: index.php');
            }
        }
        include 'views/components/edit.php';
    }

    public function delete($id)
    {
        $this->denunciaModel->id = $id;
        if ($this->denunciaModel->delete()) {
            header('Location: index.php');
        }
    }

    public function search()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $result = $this->denunciaModel->search($keyword);
        include 'views/components/index.php';
    }
}
