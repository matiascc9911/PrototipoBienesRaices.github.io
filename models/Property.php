<?php

namespace Model;

class Property extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'cocheras', 'creado', 'vendedores_id'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $cocheras;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->cocheras = $args['cocheras'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errors[] = "Debes añadir un titulo";
        }

        if(!$this->precio) {
            self::$errors[] = 'El Precio es Obligatorio';
        }

        if( strlen( $this->descripcion ) < 50 ) {
            self::$errors[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if(!$this->habitaciones) {
            self::$errors[] = 'El Número de habitaciones es obligatorio';
        }
        
        if(!$this->wc) {
            self::$errors[] = 'El Número de Baños es obligatorio';
        }

        if(!$this->cocheras) {
            self::$errors[] = 'El Número de lugares de cocheras es obligatorio';
        }
        
        if(!$this->vendedores_id) {
            self::$errors[] = 'Elige un vendedor';
        }

        if(!$this->imagen ) {
            self::$errors[] = 'La Imagen es Obligatoria';
        }

        return self::$errors;
    }

}