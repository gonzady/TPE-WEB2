<?php

require_once './app/models/weapons_model.php';
require_once './app/models/categories_model.php';
require_once './app/views/general_view.php';
require_once './app/helpers/auth_helper.php';


class ShowController {
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

    }

    public function showAllWeapons() {
        session_start();

        $weapons = $this->weapons_model->getAllWeapons();
        $categories = $this->categories_model->getAllCategories();
        $this->general_view->showAllWeapons($weapons, $categories);
    }

    public function showSingleWeapon($id) {
        session_start();

        $weapon = $this->weapons_model->getSingleWeapon($id);
        $categorie = $this->categories_model->getClass($id);
        $this->general_view->showSingleWeapon($weapon, $categorie);
    }

    public function filterWeaponsByCategorie($id_categorie){
        session_start();

        $weapons = $this->categories_model->getFilter($id_categorie);
        $categories = $this->categories_model->getAllCategories();
        $this->general_view->showAllWeapons($weapons, $categories);

    }

    public function showCategories() {
        session_start();
        
        $categories = $this->categories_model->getAllCategories();
        $this->user_view->showCategories($categories);

    }

    function showAddWeapon() {

        $this->auth_helper->checkLoggedIn();
        $categories = $this->categories_model->getAllCategories();
        $this->user_view->showAddWeapon($categories);
    }

    function showEditWeapon($id) {


        $this->auth_helper->checkLoggedIn();
        $weapon = $this->weapons_model->getSingleWeapon($id);
        $categories = $this->categories_model->getAllCategories();
        $this->user_view->showEditWeapon($weapon, $categories);
    }



}