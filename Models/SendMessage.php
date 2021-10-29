<?php



class SendMessage {
  public function sendemail($who, $item, $message, $from)
  {
        $head = "From: " . $from;
        $head .= "\nMIME-Version: 1.0\n";
        $head .= "Content-Type: text/html; charset=\"utf-8\"\n";
        if (!mb_send_mail($who, $item, $message, $head))
          throw new ErrorUser('Někde se stala chyba!');
  }
  
}





?>