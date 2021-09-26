<?PHP
class Info{
	
	private $ID;
	private $Discussion;
	function __construct($ID,$Discussion){
		
		$this->ID=$ID;
		$this->Discussion=$Discussion;
	
	}

	function getID(){
		return $this->ID;
	}
	
	function getDiscussion(){
		return $this->Discussion;
	}	
	
}

?>