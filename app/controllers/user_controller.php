<?php

require_once './app/models/weapons_model.php';
require_once './app/models/categories_model.php';
require_once './app/views/general_view.php';
require_once './app/views/user_view.php';
require_once './app/helpers/auth_helper.php';


class UserController {
    private $weapons_model;
    private $categories_model;
    private $general_view;
    private $user_view;
    private $auth_helper;

    public function __construct() {
        $this->weapons_model = new WeaponsModel();
        $this->categories_model = new CategoriesModel();
        $this->general_view = new GeneralView();
        $this->user_view = new UserView();
        $this->auth_helper = new AuthHelper();

        $this->auth_helper->checkLoggedIn();
    }

    function deleteWeapon($id){

        $this->auth_helper->checkLoggedIn();

        $this->weapons_model->deleteWeapon($id);
        header("Location: " . BASE_URL);

    }

    function editWeapon($id) {

        $this->auth_helper->checkLoggedIn();

        $weapon_name = $_POST['weapon_name'];
        $id_categorie = $_POST['id_categorie'];
        $price = $_POST['price'];
        $damage = $_POST['damage'];
        $bullets = $_POST['bullets'];
        $reach = $_POST['reach'];


            $this->weapons_model->editWeapon($weapon_name, $id_categorie, $price, $damage, $bullets, $reach, $id);
            $weapon = $this->weapons_model->getSingleWeapon($id);
            $categorie = $this->categories_model->getClass($id);
            $this->general_view->showSingleWeapon($weapon, $categorie);


    }

        

    function addWeapon(){

        $this->auth_helper->checkLoggedIn();
        
       

        $weapon_name = $_POST['weapon_name'];
        $id_categorie = $_POST['id_categorie'];
        $price = $_POST['price'];
        $damage = $_POST['damage'];
        $bullets = $_POST['bullets'];
        $reach = $_POST['reach'];


        $id = $this->weapons_model->insertWeapon($weapon_name, $id_categorie, $price, $damage, $bullets, $reach);
        header("Location: " . BASE_URL);

    }

    function deleteCategorie($id_categorie) {

        $this->auth_helper->checkLoggedIn();

        $weapons = $this->categories_model->getFilter($id_categorie);

        foreach($weapons as $weapon){
            $this->weapons_model->deleteWeapon($weapon->id);
        }

        $this->categories_model->deleteCategorie($id_categorie);
        $categories = $this->categories_model->getAllCategories();
        $this->user_view->showCategories($categories);
        

    }

    function addCategorie() {

        $this->auth_helper->checkLoggedIn();
        $class = $_POST['class'];


        $id = $this->categories_model->insertCategorie($class);
        $categories = $this->categories_model->getAllCategories();
        $this->user_view->showCategories($categories);
            
        

    }

    function editCategorie($id_categorie) {

        $this->auth_helper->checkLoggedIn();

        $class = $_POST['class'];


        $this->categories_model->editCategorie($class, $id_categorie);
        $categories = $this->categories_model->getAllCategories();
        $this->user_view->showCategories($categories);
        

    }

}