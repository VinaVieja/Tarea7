<?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;

    class CreateUsersTable extends Migration
    {
        public function up()
        {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'nombre' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'apellido' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'unique'     => true,
                ],
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'tipo' => [
                    'type'       => 'ENUM',
                    'constraint' => ['usuario', 'administrador'],
                    'default'    => 'usuario',
                ],
                'avatar' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                    'null'       => true,
                ],
                'created_at datetime default current_timestamp',
                'updated_at datetime default current_timestamp on update current_timestamp',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('users'); 
        }

        public function down()
        {
            $this->forge->dropTable('users');
        }
    }
    