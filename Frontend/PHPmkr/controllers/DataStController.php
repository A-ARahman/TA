<?php

namespace PHPMaker2024\project3;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPMaker2024\project3\Attributes\Delete;
use PHPMaker2024\project3\Attributes\Get;
use PHPMaker2024\project3\Attributes\Map;
use PHPMaker2024\project3\Attributes\Options;
use PHPMaker2024\project3\Attributes\Patch;
use PHPMaker2024\project3\Attributes\Post;
use PHPMaker2024\project3\Attributes\Put;

class DataStController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DataStList[/{data_id}]", [PermissionMiddleware::class], "list.data_st")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DataStList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DataStAdd[/{data_id}]", [PermissionMiddleware::class], "add.data_st")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DataStAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DataStView[/{data_id}]", [PermissionMiddleware::class], "view.data_st")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DataStView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DataStEdit[/{data_id}]", [PermissionMiddleware::class], "edit.data_st")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DataStEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DataStDelete[/{data_id}]", [PermissionMiddleware::class], "delete.data_st")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DataStDelete");
    }
}
