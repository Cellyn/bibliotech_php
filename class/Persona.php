<?php

// Clase base Persona
class Persona {
    protected $id;
    protected $nombre;
    protected $rol;
    protected $email;
    protected $password;

    public function __construct($id, $nombre, $rol, $email, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->rol = $rol;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT); // Encriptar contraseña
    }

    public function login($email, $password) {
        if ($this->email === $email && password_verify($password, $this->password)) {
            return "{$this->nombre} ha iniciado sesión como {$this->rol}.";
        }
        return "Credenciales incorrectas.";
    }

    public function verificarRol($rolRequerido) {
        return $this->rol === $rolRequerido;
    }
}

?>