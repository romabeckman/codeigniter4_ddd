<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Itens extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'quote_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'product' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => NULL,
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => NULL,
                'null' => TRUE
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'default' => NULL,
                'null' => TRUE
            ],
        ]);

        $this->forge->addForeignKey('quote_id', 'quotes', 'id');
        $this->forge->addKey('id', true);
        $this->forge->createTable('itens');
    }

    public function down() {
        $this->forge->dropTable('itens');
    }

}
