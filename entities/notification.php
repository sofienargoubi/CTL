<?PHP
class Notification{
    private $mail;
    private $msg;

    function __construct($mail,$msgg){
        $this->nom=$mail;
        $this->msg=$msgg;

    }

    function getMessage(){
        return $this->msg;
    }
    function getMail(){
        return $this->mail;
    }



}

?>
