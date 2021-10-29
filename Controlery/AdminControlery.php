<?php

class AdminControlery extends Controlery
{
    public function process($parameters)

    $this->head['title'] = 'Přihlášení';

    $adminUser = new AdminUser();
    if (!empty($parameters[0]) && $parameters[0] == 'logout')
    {
        $adminUser->logout();
        $this->redirect('signup');
    } 
    $user = $adminUser->backUser();
    $this->data['name'] = $user['jmeno'];
    $this->date['admin'] = $uzivatel['admin'];

    $this->wiew = 'admin';
}


?>