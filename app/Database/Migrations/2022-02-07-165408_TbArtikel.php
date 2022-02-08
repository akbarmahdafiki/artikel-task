<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbArtikel extends Migration
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

            'judul_artikel' => [
                'type' => 'VARCHAR',
                'constraint' => '60'
            ],

            'isi_artikel' => [
                'type' => 'TEXT'
            ],

            'thumbnail_artikel' => [
                'type' => 'BLOB'
            ],

            'tag_artikel' => [
                'type' => 'TEXT'
            ],

            'kategori_artikel' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tb_artikel');
    }

    public function down()
    {
        $this->forge->dropTable('tb_artikel');
    }
}
