<?php

namespace Controllers;

use Modeles\Tables\Admin;
use Modeles\Tables\Gestionnaire;
use Modeles\Tables\Maintenance;
use Modeles\Tables\Technicien;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $maitenance = new Maintenance();
        $this->setLayout("layout");
        echo $this->renderView("default", array("vehicules" => $maitenance->getAllVehicleOnMaintenanceNow()));
    }
}
