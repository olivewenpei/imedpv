<?php
namespace App\Controller;

use App\Controller\AppController;

class DashboardsController extends AppController {
    public function index () {
        $this->viewBuilder()->layout('main_layout');
    }
}