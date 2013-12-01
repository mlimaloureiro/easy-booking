<?php namespace Mlimaloureiro\EasyBooking;

use LMongo;

class ReservationManager {

	/* collection we are working on mongodb */

	protected $collection;

	/* we pass in the collection and the required array */ 

	public function __construct($collection = 'reservations') 
	{
		$this->collection = $collection;
	}

	public function create()
	{
		return new Reservation();
	}

	/* get all reservations */

	public function all() 
	{
		return LMongo::collection($this->collection)->get();
	}

	/* get total reservations */ 

	public function total()
	{
		return LMongo::collection($this->collection)->count();
	}

	/* get one single reservation */

	public function get($target) 
	{
		$reservation = new Reservation();
		return $reservation->get($target);
	}

	/* get latest reservations, $total is the max latest reservations we want */

	public function latest($total)
	{
		return LMongo::collection($this->collection)->orderBy('reservationDate','desc')
													->take($total)
													->get();
	}

	/* check if the reservation requested can be placed */ 

	protected function checkAvailability($room, $checkin, $checkout)
	{
		// TODO : check one day interval or make config option to select minimum time interval

		if($checkout <= $checkin) {

			throw new Exception("checkout variable can't be before the checkin variable");
		}

		$this->checkin = (string) $checkin;
		$this->checkout = (string) $checkout;
		$this->room = (string) $room;

		$result =  LMongo::collection($this->collection)
													->where(function($query) {

														$query->where('checkin', $this->checkin)->andWhere('roomID', $this->room);
													})
													->orWhere(function($query) {

														$query->where('checkout', $this->checkout)->andWhere('roomID', $this->room);
													})
													->orWhere(function($query) {

														$query->orWhereBetween('checkin', $this->checkin, $this->checkout)->andWhere('roomID', $this->room);
													})
													->orWhere(function($query) {

														$query->orWhereBetween('checkout', $this->checkin, $this->checkout)->andWhere('roomID', $this->room);
													})
													->count();

		return $result > 0 ? 0 : 1;

	}

}











