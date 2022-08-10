<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reserva' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'autor' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
            ],
            'estado' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_libro' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'Dias' => [
                'type' => 'INT',
                'constraint' => 5,
            ]
        ]);
        $this->forge->addKey('id_reserva', true);
        $this->forge->createTable('t_reservas');   
    }

    public function down()
    {
        $this->forge->dropTable('t_reservas');
    }
}
