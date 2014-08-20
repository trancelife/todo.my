<?php



require_once __DIR__."/model.php";
class task extends Model
{
	public $id;

	public $title;

	public $resolved;

	public $createdAd;

	public function humanResolved()
	{
		if ($this->resolved){
			return "Yes";
		} else{
			return "No";
		}

	}
}




?>