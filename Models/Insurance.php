<?php

class Insurance  {

    public function backInsurance($nazevPojisteni) 
    {
        return Db::onequestion('
        SELECT `id_pojisteni`, `nazevPojisteni`, `url`, `popisPojisteni`,`cena`
        FROM `pojisteni` 
        WHERE `url` = ?
        ', array($nazevPojisteni));
    }
    
    public function saveInsurance($id, $insurance)
    {
        if($id)
            Db::additem('pojisteni');
        else
            Db::changeitem('pojisteni',$insurance, 'WHERE id_pojisteni = ?', array($id));
    }

    public function deleteInsurance($url)
    {
        Db::question('DELETE FROM pojisteni WHERE url = ?', array($url));
    } 
    public function backInsuranceAll()
    {
        return Db::allquestion('
        SELECT `id_pojisteni`, `nazevPojisteni`, `url`, `popisPojisteni`,`cena`  
        FROM `pojisteni` 
        ORDER BY `id_pojisteni`
        ');

    }
}

?>