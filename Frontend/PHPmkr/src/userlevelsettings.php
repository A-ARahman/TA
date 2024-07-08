<?php
/**
 * PHPMaker 2024 User Level Settings
 */
namespace PHPMaker2024\project1;

/**
 * User levels
 *
 * @var array<int, string>
 * [0] int User level ID
 * [1] string User level name
 */
$USER_LEVELS = [["-2","Anonymous"]];

/**
 * User level permissions
 *
 * @var array<string, int, int>
 * [0] string Project ID + Table name
 * [1] int User level ID
 * [2] int Permissions
 */
$USER_LEVEL_PRIVS = [["{3BDC76AA-6D10-4CDF-A05B-30CA82A70EDD}data_st","-2","0"],
    ["{3BDC76AA-6D10-4CDF-A05B-30CA82A70EDD}users_st","-2","0"]];

/**
 * Tables
 *
 * @var array<string, string, string, bool, string>
 * [0] string Table name
 * [1] string Table variable name
 * [2] string Table caption
 * [3] bool Allowed for update (for userpriv.php)
 * [4] string Project ID
 * [5] string URL (for OthersController::index)
 */
$USER_LEVEL_TABLES = [["data_st","data_st","data st",true,"{3BDC76AA-6D10-4CDF-A05B-30CA82A70EDD}",""],
    ["users_st","users_st","users st",true,"{3BDC76AA-6D10-4CDF-A05B-30CA82A70EDD}","UsersStList"]];
