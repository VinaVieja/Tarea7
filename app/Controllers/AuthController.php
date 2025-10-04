<?php

    namespace App\Controllers;

    use App\Models\UserModel;
    use CodeIgniter\Controller;

    class AuthController extends BaseController
    {
        public function __construct()
        {
            helper(['form', 'url']);
        }

        // nos mostrara el formulario
        public function index()
        {
            if (session()->get('isLoggedIn')) {
                return redirect()->to(base_url('bienvenida'));
            }
            return view('auth/login');
        }

        // Muestra el formulario de registro
        public function register()
        {
            // Si ya está logueado, redirigir a bienvenida
            if (session()->get('isLoggedIn')) {
                return redirect()->to(base_url('bienvenida'));
            }
            return view('auth/register'); // La vista estará en app/Views/auth/register.php
        }

        // Procesa el registro de un nuevo usuario
        public function store()
        {
            $rules = [
                'nombre'   => 'required|min_length[3]|max_length[100]',
                'apellido' => 'required|min_length[3]|max_length[100]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'tipo'     => 'required|in_list[usuario,administrador]',
                'avatar'   => 'if_exist|uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]', // Opcional, max 1MB, solo imágenes
            ];

            if (! $this->validate($rules)) {
                return view('auth/register', [
                    'validation' => $this->validator,
                ]);
            }

            $userModel = new UserModel();

            // Manejo del avatar
            $avatarPath = 'avatars/default.png'; // Ruta predeterminada
            $file = $this->request->getFile('avatar');

            if ($file && $file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'avatars', $newName); // Mueve el archivo a public/avatars
                $avatarPath = 'avatars/' . $newName;
            }

            $data = [
                'nombre'   => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'), 
                'tipo'     => $this->request->getPost('tipo'),
                'avatar'   => $avatarPath,
            ];

            $userModel->save($data);

            return redirect()->to(base_url('/'))->with('success', 'Registro exitoso. Por favor, inicia sesión.');
        }

        public function login()
        {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[8]',
                'tipo'     => 'required|in_list[usuario,administrador]',
            ];

            if (! $this->validate($rules)) {
                return view('auth/login', [
                    'validation' => $this->validator,
                ]);
            }

            $userModel = new UserModel();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $tipo = $this->request->getPost('tipo');

            $user = $userModel->where('email', $email)
                              ->where('tipo', $tipo)
                              ->first();

            if ($user && password_verify($password, $user['password'])) {
                // inicio sesion
                $sessionData = [
                    'id'         => $user['id'],
                    'nombre'     => $user['nombre'],
                    'apellido'   => $user['apellido'],
                    'email'      => $user['email'],
                    'tipo'       => $user['tipo'],
                    'avatar'     => $user['avatar'],
                    'isLoggedIn' => true,
                ];
                session()->set($sessionData);

                return redirect()->to(base_url('bienvenida'));
            } else {
                return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas o tipo de usuario no coincide.');
            }
        }

        // cierra la sesión del usuario
        public function logout()
        {
            session()->destroy();
            return redirect()->to(base_url('/'));
        }
    }
    