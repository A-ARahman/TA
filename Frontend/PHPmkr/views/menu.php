<?php

namespace PHPMaker2024\project1;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(2, "mi_users_st", $Language->menuPhrase("2", "MenuText"), "UsersStList", -1, "", true, false, false, "", "", false, true);
echo $sideMenu->toScript();
