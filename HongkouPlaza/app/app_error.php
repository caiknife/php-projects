<?php
class AppError extends ErrorHandler {
    function error404($params) { 
        if (isset($this->controller->params['admin']) && $this->controller->params['admin']) {
            $this->controller->layout = "admin"; 
        } else {
            $this->controller->layout = "frontend"; 
        }
        $this->controller->beforeFilter();
        parent::error404($params); 
    } 
}