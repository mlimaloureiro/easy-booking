<?php namespace Mlimaloureiro\EasyBooking;

use ReservationInterface;
use LMongo;

class EasyBooking {
  
	protected $reservations;
	protected $rooms;
	protected $connection;
	protected $mongo;
	
	public function __construct($reservations,$rooms)
  	{
  		
  		$this->reservations = new $reservations;
  		$this->rooms = new RoomsInterface;
  		
  		$this->connection = LMongo::connection();
  		$this->mongo = $this->connection->getMongoDB();
  		$collection_names = $this->mongo->getCollectionNames();

  	}

  	public function getTodaySchedule() {
  		echo "today schedule";
  	}

  	public function getRecentActivity() {}

  	public function renderButton() {}

}

