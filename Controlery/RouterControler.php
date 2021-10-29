<?php

class routerControler extends Controler 
{

    protected $controler;
  
private function parseURL($url) 
{
    $parsingURL = parse_url($url);
    $parsingURL["path"] = ltrim($parsingURL["path"],  "/");
    $parsingURL["path"] = trim($parsingURL["path"]);
    $distributionWay = explode("/", $parsingURL['path']);
    return $distributionWay;
}

private function GainNameClass ($sentence)
{
    $sentence = str_replace('-', ' ', $sentence);
    $sentence = ucwords($sentence);
    $sentence = str_replace(' ', '', $sentence);
    return $sentence;
}
public function process($parameters)
    {
        $parsingURL = $this->parseURL($parameters[0]);
        
				
		if (empty($parsingURL[0]))		
			$this->redirect('uvod');
        
        $classControler = $this->GainNameClass(array_shift($parsingURL) . 'Controler');
		
		if (file_exists('Controlery/' . $classControler . '.php'))
			$this->controler = new $classControler;
		else
			$this->redirect('error');
		
        $this->controler->process($parsingURL);
		
		
		$this->data['title'] = $this->controler->head['title'];
		$this->data['description'] = $this->controler->head['description'];
		$this->data['keyword'] = $this->controler->head['keyword'];
		
        $this->data['message'] = $this->backmessage();
		
		$this->wiew = 'pattern';
    }
    

}