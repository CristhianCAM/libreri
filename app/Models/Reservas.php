<?php namespace App\Models;
    use CodeIgniter\Model;

    class Reservas extends Model{

        //datos que requiere la base de datos "tabla=Libro"
        protected $table = 't_reservas';
        protected $primaryKey = 'id_reserva';
        protected $allowedFields = ['id_reserva','email','titulo','autor','descripcion','imagen','estado','id_libro','dias'];

        public function obtenerReservas($data){
            $reserva = $this->db->table('t_reservas');
            $reserva->where($data);
            return $reserva->get()->getResultArray();
        }
    }