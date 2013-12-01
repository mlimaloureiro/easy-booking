<?php namespace Mlimaloureiro\EasyBooking;

use LMongo;

class EasyBooking {
  
	protected $reservationManager;
	protected $roomManager;
	protected $connection;
	protected $mongo;
	
	public function __construct($reservationManager, $roomManager)
  {
  		
  	$this->reservationManager = $reservationManager;
  	$this->roomManager = $roomManager;
  	$this->connection = LMongo::connection();
  	$this->mongo = $this->connection->getMongoDB();
  	$collection_names = $this->mongo->getCollectionNames();
  }

  public function ReservationManager()
  {
		return $this->reservationManager;
 	}

  public function RoomManager()
  {
  	return $this->roomManager;
  }

}

