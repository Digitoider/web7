<?php
class Bootstrap{
    public function __construct(){
        $registry = Registry::getInstance();
        $this->saveLoginDataOfAdminToRegistry();

        require_once 'controllers/visitors_controller.php';
        require_once 'models/visitors_model.php';

        $url = isset($_GET['url'])? $_GET['url']: null;

        if(empty($url)){
            $registry['page'] = 'main';
            require_once 'controllers/main_controller.php';
            $controller = new Main_controller();
            $controller->index();
            return false;
        }

        $controllerName = $url . '_controller';

        $controllerFile = 'controllers/' . $controllerName . '.php';
        if(file_exists($controllerFile)){
            require_once $controllerFile;
        }
        else{
            require_once 'controllers/error_controller.php';
            $controller = new error_controller();
            $controller->index();
            return false;
        }

        $modelName = $url . '_model';
        $modelFile = 'models/' . $modelName . '.php';
        if(file_exists($modelFile)){
            require_once $modelFile;
        }

        $registry['page'] = $url;

        $controller = new $controllerName;
        $controller->index();
    }

    private function saveLoginDataOfAdminToRegistry()
    {
        $registry = Registry::getInstance();
        $registry['adminLogin'] = 'admin@mysite.ru';
        $registry['adminPassword'] = '1111';
    }
}