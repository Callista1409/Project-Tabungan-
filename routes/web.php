<?php
class Router {
    // Metode untuk menentukan rute berdasarkan URL yang diberikan
    public function route($url) {
        switch($url) {
            case 'home':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index(); // Panggil metode index() dari HomeController
                break;
            
            case 'admin':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->admin(); // Panggil metode admin() dari HomeController
                break;

            case 'save':
                require_once 'app/controllers/SavingController.php';
                $controller = new SavingController();
                $controller->index(); // Panggil metode index() dari SavingController
                break;
            
            case 'login':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->login(); // Panggil metode login() dari AuthController
                break;
            
            case 'register':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->register(); // Panggil metode register() dari AuthController
                break;
            
            case 'logout':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->logout(); // Panggil metode logout() dari AuthController
                break;
            
            default:
                // Jika URL tidak sesuai dengan salah satu case di atas, kirim respons 404
                header("HTTP/1.0 404 Not Found");
                echo "Page not found"; // Tampilkan pesan kesalahan
                break;
        }
    }
}
?>
