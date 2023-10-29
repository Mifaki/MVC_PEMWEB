<?php

class Controller {
    public function loadModel($model) {
        $modelPath = 'apps/models/' . $model . '.php'; 
        
        if (file_exists($modelPath)) {
            require_once($modelPath);
            $model = new $model();
        } else {
            $model = null; 
        }

        return $model;
    }

    
    public function loadView($view,$data=null) {
        $viewPath = 'apps/views/' . $view . '.php'; 
        
        if (file_exists($viewPath)) {
            require_once($viewPath);
        } else {
            $view = null; 
        }

        return $view;
    }
}


?>