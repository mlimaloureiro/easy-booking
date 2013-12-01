<?php namespace Mlimaloureiro\EasyBooking;

use LMongo;

class Reservation extends ReservationManager {

	protected $collection = "reservations";

	/* array of erros this instance has */
	
	protected $errors = [];

	/* array with required fields to place a new reservation, this is necessary for validation */

	protected $required = ['client', 'reservationDate', 'checkin', 'checkout', 'roomTitle', 'roomID', 'status', 'price', 'totalPersons'];


	public function __construct($target = null, $required = null)
	{	
			
	}

	/* queries and create the properties to the object */

	public function get($target) 
	{
		$query = LMongo::collection($this->collection)->find($target);

		if(isset($query['_id'])) {
			// create object, TODO : needs to put it recursive, accessing client data from array

			$this->mongoToObject();
		}

	}

	/* converts mongo fetched array to object */

	private function mongoToObject()
	{
		foreach($query as $key => $value)
		{
			$this->$key = $value;
		}

		return $this;
	}

	/* do the opposite */

	private function objectToMongo()
	{
		$array = [];

		/* clean unnecessary variables */
		foreach($this->required as $key => $value) {
			$array[$value] = $this->$value;
		}

		//print_r($array);

		return $array;
	}

	/* delete from mongo */

	public function delete()
	{
		LMongo::collection($this->collection)->where('_id', $this->_id)->remove();
	}

	/* save it to mongo, returns if successfull */

	public function save()
	{
		if($this->validate() && parent::checkAvailability($this->roomID, $this->checkin, $this->checkout)) {
			// converts object to array and clean vars
			$values = $this->objectToMongo();

			$this->_id = LMongo::collection($this->collection)->insert($values);

			return;
		}
	}

	/* for manually handling of reservations, check if the reservation is pending, handled or closed */ 

	public function status($target)
	{
		return $this->status;
	}

	/* very simple validation method, todo: create validation class for the system ? */ 

	protected function validate()
	{
		// first lets just check if we have all inputs required

		foreach($this->required as $v) {

			if(!isset($this->$v)) {
				echo "Error: Doesn't exist " . $v;
				return 0;
			}
		}

		return 1;
	}

	/* display error messages */

	public function displayErrors()
	{
		return $this->errors;
	}

	
}




