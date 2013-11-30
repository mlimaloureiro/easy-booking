<?php namespace Mlimaloureiro\EasyBooking;

use ReservationInterface;
use RoomInterface;
use ClientInterface;
use LMongo;

class EasyBooking {
  
	protected $reservations;
	protected $rooms;
	protected $clients;
	protected $connection;
	protected $mongo;
	
	public function __construct()
  	{
  		/*
  		$this->reservations = $reservations;
  		$this->rooms = $rooms;
  		*/
  		$this->connection = LMongo::connection();
  		$this->mongo = $this->connection->getMongoDB();
  		$collection_names = $this->mongo->getCollectionNames();
  		print_r($collection_names);
  	}

  	public function getTodaySchedule() {
  		echo "today schedule";
  	}

  	public function getRecentActivity() {}

  	public function renderButton() {}

}

