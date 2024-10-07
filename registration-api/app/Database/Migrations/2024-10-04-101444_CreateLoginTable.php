<?php

/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-04 13:35:42
 * @modify date 2024-10-04 13:35:42
 * @desc Login table
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLoginTable extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'staff_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'activation_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on update' => 'CURRENT_TIMESTAMP',
            ],
            'author' => [
                'type'       => 'ENUM("_self_", "_dfcuhr_")',
                'default' => '_self_',
                'null' => false
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp'
        ]);

        //Foreign key refering to employees table
        $this->forge->addForeignKey('staff_id', 'employees', 'id', 'NULL', 'NULL');
        $this->forge->addKey('id', true);
        $this->forge->createTable('login');

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function down()
    {
        $this->forge->dropForeignKey('login','staff_id');
        $this->forge->dropTable('login');
    }

    
}
