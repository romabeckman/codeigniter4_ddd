<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quotes extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'valid_at' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['approved', 'pending', 'rejected'],
                'default' => 'pending',
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

        $this->forge->addForeignKey('customer_id', 'customers', 'id');
        $this->forge->addKey('id', true);
        $this->forge->createTable('quotes');
    }

    public function down() {
        $this->forge->dropTable('quotes');
    }

}
