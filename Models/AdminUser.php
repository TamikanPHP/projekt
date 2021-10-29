<?php

    class AdminUser 
    {
        public function signup($name, $password)
        {
            $uzivatel = Db::onequestion('
            SELECT id_admin, jmeno, heslo
            FROM admin
            WHERE jmeno = ?
            ', array($name));
            if(!$admin || !$password)
                throw new ErrorUser('Neplatné jméno nebo heslo');
            $_SESSION['admin'] = $admin;
        }

        public function logout ()
        {
            unset($_SESSION['admin']);
        }

        public function backUser()
        {
            if(isset($_SESSION['admin']))
                return $_SESSION['admin'];
            return null;
        }    
        
    }
?>