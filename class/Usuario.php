<?php
// Clase Usuario
class Usuario extends Persona {
    public function __construct($id, $nombre, $email, $password) {
        parent::__construct($id, $nombre, "usuario", $email, $password);
    }

    public function buscarLibro($libros, $titulo) {
        foreach ($libros as $libro) {
            if ($libro->getTitulo() === $titulo) {
                return $libro;
            }
        }
        return null;
    }

    public function solicitarPrestamo(Libro $libro, $fechaPrestamo) {
        if ($libro->estaDisponible()) {
            $libro->prestar();
            return new Prestamo($libro, $fechaPrestamo);
        }
        return null;
    }
}
?>