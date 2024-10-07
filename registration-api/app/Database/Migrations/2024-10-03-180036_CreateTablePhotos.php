<?php

/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-04 06:55:48
 * @modify date 2024-10-04 06:55:48
 * @desc Employees photo table structure
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePhotos extends Migration
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
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on update' => 'CURRENT_TIMESTAMP',
            ],
            'is_active' => [
                'type'       => 'ENUM("_yes_", "_no_")',
                'default' => '_yes_',
                'null' => false
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
        $this->forge->createTable('photos');

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function down()
    {
        $this->forge->dropForeignKey('photos','staff_id');
        $this->forge->dropTable('photos');
    }
}
