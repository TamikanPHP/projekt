<?php

class InsuranceControler extends Controler 
{
    public function process($parameters) 
    { 
        $insurance = new Insurance();

        if (!empty($parameters[0]))

        {

            $getinsurance = $insurance->backInsurance($parameters[0]);

            if(!$getinsurance)
                $this->redirect('chyba');

            $this->head = array (
                'title' => $getinsurance['nazevPojisteni'],
                'keyword' => $getinsurance['cena'],
                'description' => $getinsurance['popisPojisteni'],
            );
            
            $this->data['id_pojisteni'] = $getinsurance['id_pojisteni'];
            $this->data['nazevPojisteni'] = $getinsurance['nazevPojisteni'];
            $this->data['popisPojisteni'] = $getinsurance['popisPojisteni'];
            $this->data['cena'] = $getinsurance['cena'];
            $this->wiew = 'insurance';
        }
        else
        {
            $insurances = $insurance->backInsuranceAll();
            $this->data['insurances'] = $insurances;
            $this->wiew = 'insurances';
        }    

    }    

}    
?>