<?php

class RegisterControler extends Controler 
{
    
    public function process($parameters) 
    {
        $this->head = array (
            'title' => 'Registrace',
            'keyword' => 'Regitrace',
            'description' => 'Formulař nového zákazníka'
        );

        if ($_POST) 
        {
            try
            {
                $sendmessage = new SendMessage();
                $sendmessage->sendemail("tomasvalek@seznam.cz", "Nový zákazník", $message = "Ahoj Tome <br/>
                Jméno: " . $_POST['name'] . "<br/>Přímení:  " . $_POST['surname'] . "<br/>Telefon " . $_POST['phone'] . "<br/>Email: " . $_POST['email'], 
                $_POST['email']);
                $this->addMessage('Email byl odeslán');
                $this->redirect('register');
            }
            catch (ErrorUser $error)
            {
                $this->addMessage($error->getMessage());
            }
        }

        $this->wiew = 'register';
    }
}    


?>