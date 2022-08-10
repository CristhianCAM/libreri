<?php namespace App\Models;
    use CodeIgniter\Model;

    class Libros extends Model{

        //datos que requiere la base de datos "tabla=Libro"
        protected $table = 't_libros';
        protected $primaryKey = 'id_libro';
        protected $allowedFields = ['id_libro','titulo','autor','descripcion','imagen','estado'];

        public function obtenerLibros($data){
            $Libro = $this->db->table('t_libros');
            $Libro->where($data);
            return $Libro->get()->getResultArray();
        }
    }