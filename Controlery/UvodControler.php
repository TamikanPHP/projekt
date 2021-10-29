<?php

class UvodControler extends Controler 
{
    
    public function process($parameters) 
    {
        $this->head = array (
            'title' => 'Hlavní stránka',
            'keyword' => 'Účetnictví',
            'description' => 'Vítejte'
        );

        $this->wiew = 'uvod';
    }
}    


?>