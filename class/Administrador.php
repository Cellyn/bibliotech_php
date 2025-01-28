<?php
// Clase Administrador
class Administrador extends Persona {
    public function __construct($id, $nombre, $email, $password) {
        parent::__construct($id, $nombre, "administrador", $email, $password);
    }

    public function agregarLibro(&$libros, $id, $titulo, Autor $autor, Categoria $categoria) {
        if (!$this->verificarRol("administrador")) {
            return "Acceso denegado. Se requiere rol de administrador.";
        }
        $libro = new Libro($id, $titulo, $autor, $categoria);
        $libros[] = $libro;
        return "Libro '{$titulo}' agregado correctamente.";
    }

    public function editarLibro(&$libros, $id, $nuevoTitulo) {
        if (!$this->verificarRol("administrador")) {
            return "Acceso denegado. Se requiere rol de administrador.";
        }
        foreach ($libros as $libro) {
            if ($libro->getId() === $id) {
                $libro->setTitulo($nuevoTitulo);
                return "Libro actualizado correctamente.";
            }
        }
        return "Libro no encontrado.";
    }

    public function eliminarLibro(&$libros, $id) {
        if (!$this->verificarRol("administrador")) {
            return "Acceso denegado. Se requiere rol de administrador.";
        }
        foreach ($libros as $key => $libro) {
            if ($libro->getId() === $id) {
                unset($libros[$key]);
                return "Libro eliminado correctamente.";
            }
        }
        return "Libro no encontrado.";
    }
}
?>