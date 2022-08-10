<?php namespace App\Models;
    use CodeIgniter\Model;

    class Usuarios extends Model{

        //datos que requiere la base de datos "tabla=Usuarios"
        protected $table = 't_usuarios';
        protected $primaryKey = 'id_usuarios';
        protected $allowedFields = ['usuario','email','password','type'];

        
        public function obtenerUsuario($data){
            $Usuario = $this->db->table('t_usuarios');
            $Usuario->where($data);
            return $Usuario->get()->getResultArray();
        }
    }