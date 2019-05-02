<?php

namespace Controllers;

use Modeles\Tables\Admin;
use Modeles\Tables\Gestionnaire;
use Modeles\Tables\Maintenance;
use Modeles\Tables\Piece;
use Modeles\Tables\Probleme;
use Modeles\Tables\Technicien;
use Modeles\Tables\Type_vehicule;
use Modeles\Tables\Vehicule;

class ApiController
{
    public function gestionnaireAction()
    {
        $table = new Gestionnaire();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->findAll());
    }

    public function maintenanceAction()
    {
        $table = new Maintenance();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->restFindAll());
    }

    public function pieceAction()
    {
        $table = new Piece();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->restFindAll());
    }

    public function problemeAction()
    {
        $table = new Probleme();
        $table->findAll();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->restFindAll());
    }

    public function technicienAction()
    {
        $table = new Technicien();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->findAll());
    }

    public function typeVehiculeAction()
    {
        $table = new Type_vehicule();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->findAll());
    }

    public function vehiculeAction()
    {
        $table = new Vehicule();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($table->restFindAll());
    }
}
