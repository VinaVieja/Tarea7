    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    $routes->get('/', 'AuthController::index');
    $routes->get('register', 'AuthController::register'); // este es del formulario de registro
    $routes->post('register/store', 'AuthController::store'); // este cumple la funcion de procesar el registro
    $routes->post('login', 'AuthController::login'); // el de aqui es  el login
    $routes->get('bienvenida', 'WelcomeController::index', ['filter' => 'auth']); // es la pagina de bienvenida
    $routes->get('logout', 'AuthController::logout'); // Cerrar sesión

    $routes->get('bienvenida', 'WelcomeController::index', ['filter' => 'auth']);
    