<?php




class Cat
{
	private $maxCats = 4;

	private function diagnoste ($maxCats=false)
	{
		if ($maxCats){
			$this->maxCats = $maxCats
		}
		return rand(0,1);
		
	}

	public function born()
	{
		if (this->diagnoste())
		{
		return rand(0, $this->maxCats);
	}
	else{
		return "some problems"
	}
}

	public function iFed()
	{
		this->born();
		for ($i=0; $i < $this->maxCats; $i++) { 
			echo "Покормила<br/>";
		}
	}

		$kity = new Cat();
		echo $kity->born();

?>



