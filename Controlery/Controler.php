<?php

abstract class Controler
{
    protected $data = array();
    protected $wiew = "";
    protected $head = array('title' => '', 'keyword' => '', 'description' => '');

public function showwiew()
{
     if($this->wiew)
     {
         extract($this->data);
         require("Wiews/" . $this->wiew . ".phtml");

     }
 }

 public function addMessage($message)
{
    if (isset($_SESSION['message']))
        $_SESSION['message'] = $message;
    else
        $_SESSION['message'] = array($message);
}

public function backMessage()
{
    if (isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        return $message;
    }
    else
        return array();
}

 public function redirect($url)
	{
		header("Location: /$url");
		header("Connection: close");
                exit;
	}

abstract function process($parameters);


}

?>