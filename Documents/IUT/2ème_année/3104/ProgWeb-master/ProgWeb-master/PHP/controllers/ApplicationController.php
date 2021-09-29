<?php

class ApplicationController{
    private $path;
    private static $instance;
    private function __construct(){
        $this->path = [
            '/' => ['controller' =>'MainController','view' =>'MainView'],
            '' => ['controller' =>'MainController','view' =>'MainView'],
            'user_add' => ['controller'=> 'AddUserController', 'view'=>'AddUserValidationView'],
            'user_connect' => ['controller'=> 'ConnectUserController', 'view'=>'ConnectUserValidationView'],
            'user_disconnect' => ['controller'=> 'DisconnectUserController', 'view'=>'DisconnectUserVue'],
            'upload_activity' => ['controller'=> 'UploadActivityController', 'view'=>null],
            'list_activities' => ['controller'=> 'ListActivityController', 'view'=>'ListActivityView'],
            'user_update' => ['controller'=> 'UpdateUserController', 'view'=>'UpdateUserValidationView'],

            'user_add_form' => ['controller'=>null, 'view'=>'AddUserForm'],
            'user_connect_form' => ['controller'=>null, 'view'=>'ConnectUserForm'],
            'upload_activity_form' => ['controller'=>null, 'view'=>'UploadActivityForm'],
            'user_update_form' => ['controller'=> null, 'view'=>'UpdateUserForm'],
            'error' => ['controller' => null, 'view'=>'ErrorView']
        ];
    }

    /**
     * Returns the single instance of this class.
     * @return ApplicationController the single instance of this class.
     */
    public static function getInstance(){
        if (!isset(self::$instance)) {
            self::$instance = new ApplicationController;
        }

        return self::$instance;
    }

    public function getController($request){
        if (array_key_exists($request['page'], $this->path)) {
            return $this->path[$request['page']]['controller'];
        }

        return null;
    }

    public function getView($request){
        if (array_key_exists($request['page'], $this->path)) {
            return $this->path[$request['page']]['view'];
        }

        return $this->path['error']['view'];
    }

}