<?php
class Router {
    public function route($url) {
        switch($url) {
            case 'home':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;
            
            case 'admin':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->admin();
                break;
        
            
        }
    }
}