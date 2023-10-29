<?php

class Home extends Controller
{

    private $dt;
    private $df;

    public function __construct()
    {
        $this->dt = $this->loadModel('Barang');
        $this->df = $this->loadModel('daftarBarang');
    }

    public function index()
    {
        echo "P Index";
    }

    public function home($data1, $data2)
    {
        echo $data1, $data2;
    }

    public function lihatData($id)
    {
        $data = $this->df->getDataById($id);
        $this->loadView('template/Header', ['title' => 'Detail Barang']);
        $this->loadView('home/detailBarang', $data);
        $this->loadView('template/Footer', $data);
    }

    public function listBarang()
    {
        $data = $this->df->getData();
        $this->loadView('template/Header', ['title' => 'List Barang']);
        $this->loadView('home/ListBarang', $data);
        $this->loadView('template/Footer', $data);
    }

    public function insertbarang()
    {
        if (!empty($_POST)) {
            if ($this->df->tambahBarang($_POST)) {
                header('Location: ' . BASE_URL . 'index.php?r=home/listBarang');
                exit;
            }

        }
        $this->loadview('template/Header', ['title' => 'Insert Barang']);
        $this->loadview("home/Form");
        $this->loadview('template/Footer');
    }

    public function updatebarang($id)
    {
        $data = $this->df->getDataById($id);

        if (!empty($_POST)) {
            if ($this->df->updateBarang($_POST)) {
                header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
                exit;
            }

        }

        $this->loadview('template/Header', ['title' => 'Update Barang']);
        $this->loadview("home/Update", $data);
        $this->loadview('template/Footer');

    }

    public function deletebarang($id)
    {
        $data = $this->df->getDataById($id);

        if ($this->df->hapusBarang($id)) {
            header('Location: ' . BASE_URL . 'index.php?r=home/listbarang');
            exit;
        }

    }
}
?>