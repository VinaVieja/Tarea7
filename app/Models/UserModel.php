<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model
    {
        protected $table            = 'users'; 
        protected $primaryKey       = 'id';
        protected $useAutoIncrement = true;
        protected $returnType       = 'array'; 
        protected $useSoftDeletes   = false; 

        protected $allowedFields    = ['nombre', 'apellido', 'email', 'password', 'tipo', 'avatar'];


        protected $useTimestamps = true;
        protected $dateFormat    = 'datetime';
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';


        protected $validationRules = [
            'nombre'   => 'required|min_length[3]|max_length[100]',
            'apellido' => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'tipo'     => 'required|in_list[usuario,administrador]',
        ];
        protected $validationMessages = [
            'email' => [
                'is_unique' => 'Este correo electrónico ya está registrado.',
            ],
        ];
        protected $skipValidation       = false;
        protected $cleanValidationRules = true;

        // Callbacks
        protected $allowCallbacks = true;
        protected $beforeInsert   = ['hashPassword'];
        protected $beforeUpdate   = ['hashPassword'];

        protected function hashPassword(array $data)
        {
            if (isset($data['data']['password'])) {
                $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            }

            return $data;
        }
    }
    