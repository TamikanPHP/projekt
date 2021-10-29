<?php

class errorControler extends Controler
{
    public function process($parameters)
    {
    header("HTTP/1.0 404 Not Found");
    $this->head['title'] = 'Chyba 404';
    $this->wiew = 'error';
    }
}
