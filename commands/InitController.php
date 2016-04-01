<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;

class InitController extends Controller
{
    public function actionUser(){
        echo "Create init user...\n";
        $username = $this->prompt('Input Username:');
        $email = $this->prompt("Input email for $username:");
        $password = $this->prompt("Input password for $username:");

        $user = new User();
        $user->username = $username;
        $user->inputPassword = $password;
        $user->email = $email;

        if(!$user->save()){
            foreach ($user->getErrors() as $errors){
                foreach ($errors as $e){
                    echo "$e\n";
                }
            }
            return 1;
        }
        return 0;
    }
}