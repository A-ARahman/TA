<?php

namespace PHPMaker2024\project1;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPMaker2024\project1\Attributes\Delete;
use PHPMaker2024\project1\Attributes\Get;
use PHPMaker2024\project1\Attributes\Map;
use PHPMaker2024\project1\Attributes\Options;
use PHPMaker2024\project1\Attributes\Patch;
use PHPMaker2024\project1\Attributes\Post;
use PHPMaker2024\project1\Attributes\Put;

class UsersStController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/UsersStList[/{user_id}]", [PermissionMiddleware::class], "list.users_st")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UsersStList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/UsersStAdd[/{user_id}]", [PermissionMiddleware::class], "add.users_st")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UsersStAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/UsersStView[/{user_id}]", [PermissionMiddleware::class], "view.users_st")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UsersStView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/UsersStEdit[/{user_id}]", [PermissionMiddleware::class], "edit.users_st")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UsersStEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/UsersStDelete[/{user_id}]", [PermissionMiddleware::class], "delete.users_st")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UsersStDelete");
    }
}
