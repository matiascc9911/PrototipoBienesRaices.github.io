<?php

namespace Model;

class Seller extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$errors[] = "El Nombre es Obligatorio";
        }

        if(!$this->apellido) {
            self::$errors[] = "El Apellido es Obligatorio";
        }

        if(!$this->telefono) {
            self::$errors[] = "El Teléfono es Obligatorio";
        }

        return self::$errors;
    }

}