<?php

/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-04 06:55:48
 * @modify date 2024-10-04 06:55:48
 * @desc Employees table structure
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'staff_surname' => [
                'type'       => 'CHAR',
                'constraint' => '200',
                'null' => false
            ],
            'staff_othername' => [
                'type'       => 'CHAR',
                'constraint' => '200',
                'null' => false
            ],
            'staff_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'staff_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => false
            ],
            'staff_dob' => [
                'type'       => 'DATE',
                'null' => false
            ],
            'staff_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'author' => [
                'type'       => 'ENUM("_self_", "_dfcuhr_")',
                'default' => '_self_',
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
