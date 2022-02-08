<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],

            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '40',
            ],

            'password' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tb_admin');
    }

    public function down()
    {
        $this->forge->dropTable('tb_admin');
    }
}
