<?php

// Clase Préstamo 

class Prestamo {
    private $libro;
    private $fechaPrestamo;
    private $fechaDevolucion;

    public function __construct(Libro $libro, $fechaPrestamo) {
        $this->libro = $libro;
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function registrarDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
        $this->libro->devolver();
    }

    public function getInfo() {
        return "Libro: " . $this->libro->getTitulo() . 
               ", Fecha Préstamo: " . $this->fechaPrestamo . 
               ", Fecha Devolución: " . $this->fechaDevolucion;
    }
}

?>