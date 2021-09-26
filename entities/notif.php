<?PHP
class Notif
{
	private $Sujet;
	private $Type;
	private $Num;

	function __construct($Sujet,$Type,$Num)
	{
		$this->Sujet=$Sujet;
		$this->Type=$Type;
		$this->Num=$Num;
	}
	
	function getSujet()
	{
		return $this->Sujet;
	}
	function setSujet($Sujet)
	{
		$this->Titre=$Titre;
	}

	function getType()
	{
		return $this->Type;
	}
	function setType($Type)
	{
		$this->Type=$Type;
	}

	function getNum()
	{
		return $this->Num;
	}
	function setNum($Num)
	{
		$this->Num=$Num;
	}

}

?>