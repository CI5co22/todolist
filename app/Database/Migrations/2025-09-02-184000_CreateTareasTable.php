<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTareasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'estado' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'fecha' => [
                'type' => 'DATE',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tareas');
    }

    public function down()
    {
        $this->forge->dropTable('tareas');
    }
}
