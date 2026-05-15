<?php
require_once __DIR__ . '/../core/Controller.php';
// Controlador de la vistas Cargos. --- Solo accesible para usuarios que hayan iniciado sesión.
class AsistenciaController extends Controller {
        public function index(): void{
        $this->reporte(); //funcion de la vistas reportes();
    } 
    //Este es la funcion que pusiste arriba en $this->reporte();
    public function reporte(): void {
        // Si $_SESSION['usuario'] no existe, lo mandamos al login.
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        // Enviamos los datos a la vista.
        $this->view('asistencias/reportes', [
        'usuario' => $_SESSION['usuario'],
        ]);
    }
    public function reportes(): void {
        // Reutilizamos la implementación de reporte() para mantener DRY.
        $this->reporte();
    }
}

?>