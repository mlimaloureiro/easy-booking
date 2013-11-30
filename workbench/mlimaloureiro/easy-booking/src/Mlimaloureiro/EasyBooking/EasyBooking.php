<?php namespace Mlimaloureiro\EasyBooking;

use ReservationInterface;
use LMongo;

class EasyBooking {
  
	protected $reservation;
	protected $room;
	protected $connection;
	protected $mongo;
	
	public function __construct($reservation, $room)
  {
  		
  	$this->reservation = $reservation;
  	$this->room = $room;
  	$this->connection = LMongo::connection();
  	$this->mongo = $this->connection->getMongoDB();
  	$collection_names = $this->mongo->getCollectionNames();
  }

  public function reservation()
  {
		return $this->reservation;
 	}

  public function room()
  {
  	return $this->room;
  }


}

