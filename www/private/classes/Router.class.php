<?php

class Router {
    public function defaultRoute() {
        $asciiOnly = $_GET['c'];
        if ($this->isWord($asciiOnly)) {
            // ILLEGAL CONTROLLER NAME PATH
            http_response_code(400);
            return;
        }

        $pickController = $asciiOnly.'Controller';
        if (class_exists(($pickController))) {
            $instance = new $pickController();
            if (is_subclass_of($instance, "Controller")) {
                // SUCCESSFUL PATH                
                return $this->routeTo($instance);
            }
        }

        // NOT FOUND PATH
        http_response_code(404);
    }

    public function routeTo(Controller $controller) {
        $pair = $controller->controller();
        if (is_array($pair) && sizeof($pair) == 2 && is_subclass_of($pair[1], "View")) {
            $model = $pair[0];
            $view = $pair[1];

            $this->renderModelAndView($model, $view);
        }
        else {
            http_response_code(500);
            echo "ROUTE ERROR - PAIR FAIL";
        }
    }

    public function renderModelAndView($model, $view) {
        $view->render($model);
    }

    private function isWord($it) {
        return 1 != preg_match('/^\w+$/', $it);
    }
}