<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Libros extends Seeder
{
    public function run()
    {
        $titulo = "Libro 1";
        $autor = "Autor del Libro 1";
        $descripcion = "Esta es la descripcion del libro 1";
        $obtener = "libro1.png";
        $imagen = "libro1.png";
        $estado = "disponible";

        $data = [
            'titulo' => $titulo,
            'autor' => $autor,
            'descripcion'    => $descripcion,
            'imagen' => $imagen,
            'estado' => $estado
        ];

        // Using Query Builder
        $this->db->table('t_libros')->insert($data);
    }
}

// <!-- longblob -->