<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class UserView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function showAddWeapon($categories) {

        $this->smarty->assign('categories', $categories); 

        $this->smarty->display('new_weapon.tpl');
    }

    function showEditWeapon($weapon, $categories) {

        $this->smarty->assign('weapon', $weapon);
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('edit_weapon.tpl');

    }

    function showCategories($categories, $error = null) {

        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('error', $error);

        $this->smarty->display('categories.tpl');

    }


}