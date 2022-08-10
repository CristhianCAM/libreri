<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Libro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_libro' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'autor' => [
                'type'       => 'VARCHAR',
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
        ]);
        $this->forge->addKey('id_libro', true);
        $this->forge->createTable('t_libros');
    }

    public function down()
    {
        $this->forge->dropTable('t_libros');
    }
}
