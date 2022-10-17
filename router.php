<?php
require_once './app/controllers/show_controller.php';
require_once './app/controllers/user_controller.php';
require_once './app/controllers/auth_controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'showAll'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);




switch ($params[0]) {
    case 'showAll':
        $show_controller = new ShowController();
        $show_controller->showAllWeapons();
        break;
    
    case 'showWeapon':
        $show_controller = new ShowController();
        $id = $params[1];
        $show_controller->showSingleWeapon($id);
        break;

    case 'showAdd':
        $show_controller = new ShowController();
        $show_controller->showAddWeapon();
        break;

    case 'showEdit':
        $show_controller = new ShowController();
        $id = $params[1];
        $show_controller->showEditWeapon($id);
        break;

    case 'showCategories':
        $show_controller = new ShowController();
        $show_controller->showCategories();
        break;
        
    case 'add':
        $user_controller = new UserController();
        $user_controller->addWeapon();
        break;

    case 'filter':
        $show_controller = new ShowController();
        $id_categorie = $params[1];
        $show_controller->filterWeaponsByCategorie($id_categorie);
        break;

    case 'delete':
        $user_controller = new UserController();
        $id = $params[1];
        $user_controller->deleteWeapon($id);
        break;

    case 'deleteCategorie':
        $user_controller = new UserController();
        $id_categorie = $params[1];
        $user_controller->deleteCategorie($id_categorie);
        break;

    case 'editCategorie':
        $user_controller = new UserController();
        $id_categorie = $params[1];
        $user_controller->editCategorie($id_categorie);
        break;
    
    case 'addCategorie':
        $user_controller = new UserController();
        $user_controller->addCategorie();
        break;

    case "edit":
        $user_controller = new UserController();
        $id = $params[1];
        $user_controller->editWeapon($id);
        break;

    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;

    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
       
    default:
        echo('404 Page not found');
        break;
}

