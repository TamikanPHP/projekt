<?php

class SignupControler extends Controler 
{
    
    public function process($parameters) 
    {
        $adminUser = new AdminUser();
        if ($adminUser->backUser())
            $this->redirect('admin');
        $this->head['title'] = 'Přihlášení';
        if ($_POST)
        {
            try
            {   
                $adminUser->signup($_POST['name'], $_POST['password']);
                $this->addMessage('Jsem přihlášen.');
                $this->redirect('admin');
            }
            catch (ErrorUser $error)
            {
                $this->addMessage($error->getMessage());
            }
        }
        $this->wiew = 'signup';
    }
}    


?>