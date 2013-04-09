<?php
class Administrator extends AppModel {
    public function getAdmin($username, $password) {
        return $this->where(array(
            'username' => $username,
            'password' => md5($password),
            'deleted'  => 0,
        ))->first();
    }
}