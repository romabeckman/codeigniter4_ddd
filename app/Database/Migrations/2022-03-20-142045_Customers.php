<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('customers');
    }

    public function down() {
        $this->forge->dropTable('customers');
    }

}
