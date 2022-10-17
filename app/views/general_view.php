<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class GeneralView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showAllWeapons($weapons, $categories) {

        $this->smarty->assign('weapons', $weapons);
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('all_weapons.tpl');
    }

    public function showSingleWeapon($weapon, $categorie) {
        $this->smarty->assign('weapon', $weapon);
        $this->smarty->assign('categorie', $categorie);

        $this->smarty->display('single_weapon.tpl');
    }


    public function showFormLogin($error = null) {
        $this->smarty->assign("error", $error);
        
        $this->smarty->display('login.tpl');
    }


}