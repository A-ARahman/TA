<?php return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
    $o = [
        clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['PHPMaker2024\\project1\\Attributes\\Get'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('PHPMaker2024\\project1\\Attributes\\Get')),
        clone $p['PHPMaker2024\\project1\\Attributes\\Get'],
        clone ($p['PHPMaker2024\\project1\\Attributes\\Map'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('PHPMaker2024\\project1\\Attributes\\Map')),
        clone $p['PHPMaker2024\\project1\\Attributes\\Map'],
        clone $p['PHPMaker2024\\project1\\Attributes\\Map'],
        clone $p['PHPMaker2024\\project1\\Attributes\\Map'],
        clone $p['PHPMaker2024\\project1\\Attributes\\Map'],
    ],
    null,
    [
        'PHPMaker2024\\project1\\Attributes\\Map' => [
            'methods' => [
                [
                    'GET',
                ],
                [
                    'GET',
                ],
                [
                    'GET',
                    'POST',
                    'OPTIONS',
                ],
                [
                    'GET',
                    'POST',
                    'OPTIONS',
                ],
                [
                    'GET',
                    'POST',
                    'OPTIONS',
                ],
                [
                    'GET',
                    'POST',
                    'OPTIONS',
                ],
                [
                    'GET',
                    'POST',
                    'OPTIONS',
                ],
            ],
            'pattern' => [
                '/swagger/swagger',
                '/[index]',
                '/UsersStList[/{user_id}]',
                '/UsersStAdd[/{user_id}]',
                '/UsersStView[/{user_id}]',
                '/UsersStEdit[/{user_id}]',
                '/UsersStDelete[/{user_id}]',
            ],
            'handler' => [
                'PHPMaker2024\\project1\\OthersController:swagger',
                'PHPMaker2024\\project1\\OthersController:index',
                'PHPMaker2024\\project1\\UsersStController:list',
                'PHPMaker2024\\project1\\UsersStController:add',
                'PHPMaker2024\\project1\\UsersStController:view',
                'PHPMaker2024\\project1\\UsersStController:edit',
                'PHPMaker2024\\project1\\UsersStController:delete',
            ],
            'middleware' => [
                [],
                [
                    'PHPMaker2024\\project1\\PermissionMiddleware',
                ],
                [
                    'PHPMaker2024\\project1\\PermissionMiddleware',
                ],
                [
                    'PHPMaker2024\\project1\\PermissionMiddleware',
                ],
                [
                    'PHPMaker2024\\project1\\PermissionMiddleware',
                ],
                [
                    'PHPMaker2024\\project1\\PermissionMiddleware',
                ],
                [
                    'PHPMaker2024\\project1\\PermissionMiddleware',
                ],
            ],
            'name' => [
                'swagger',
                'index',
                'list.users_st',
                'add.users_st',
                'view.users_st',
                'edit.users_st',
                'delete.users_st',
            ],
            'options' => [
                [],
                [],
                [],
                [],
                [],
                [],
                [],
            ],
        ],
    ],
    [
        $o[0],
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
    ],
    []
);