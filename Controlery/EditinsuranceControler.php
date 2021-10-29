<?php

    class EditinsuranceControler extends Controler
    {

        public function process($parameters)
        {
            $this->head['title'] = 'Editor článků';

            $getinsurance = new Insurance();
            $insurance = array(
                'id_pojisteni' => '',
                'nazevPojisteni' => '',
                'popisPojisteni' => '',
                'cena' => '',);
            if ($_POST)
            {
                $keys = array('nazevPojisteni', 'popisPojisteni', 'cena');
                $insurance = array_intersect_key(($_POST), array_flip($keys));
                $getinsurance->saveInsurance($_POST['id_pojisteni'], $insurance);
                $this->addMessage('Pojištění je uloženo!');
                $this->redirect('insurence/' . $insurance['id_pojisteni']);
            }    
            else if (!empty($parameters[0]))
            {
                $loadinsurance = $getinsurance->backInsurance($parameters[0]);
                if ($loadinsurance)
                    $insurance = $loadinsurance;
                else
                    $this->addMessage('Článek nebyl nalezen');
            }
            $this->data['insurance'] = $insurance;
            $this->wiew = 'editinsurance';
        }

    }
?>