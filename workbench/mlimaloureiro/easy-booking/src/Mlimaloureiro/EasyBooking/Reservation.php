<?php namespace Mlimaloureiro\EasyBooking;

use LMongo;

class Reservation {


	protected $collection;

	public function __construct($collection = 'reservations') 
	{
		$this->collection = $collection;
	}

	public function all() 
	{
		return LMongo::collection($this->collection)->get();
	}

	public function total()
	{
		return LMongo::collection($this->collection)->count();
	}

	public function get($target) 
	{
		return LMongo::collection($this->collection)->find($target);
	}

	public function set($target, $data) 	
	{
		LMongo::collection($this->collection)->where('_id', $target)->update($data);
	}

	public function latest($total)
	{
		return LMongo::collection($this->collection)->orderBy('reservationDate','desc')->take($total)->get();
	}

	public function status($target)
	{
 
	}

	public function insert($data = array())
	{
		$id = LMongo::collection($this->collection)->insert($data);
	}

	public function availability($room, $checkin, $checkout)
	{
		// check one day interval

		if($checkout <= $checkin) {
			throw new Exception("Checkout variable can't be before the checkin variable");
		}

		$this->checkin = (string) $checkin;
		$this->checkout = (string) $checkout;
		$this->room = (string) $room;

		$result =  LMongo::collection($this->collection)->where(function($query) {
														$query->where('checkIn', $this->checkin)->andWhere('roomID', $this->room);
													})
													->orWhere(function($query) {
														$query->where('checkOut', $this->checkout)->andWhere('roomID', $this->room);
													})
													->orWhere(function($query) {
														$query->orWhereBetween('checkIn', $this->checkin, $this->checkout)->andWhere('roomID', $this->room);
													})
													->orWhere(function($query) {
														$query->orWhereBetween('checkOut', $this->checkin, $this->checkout)->andWhere('roomID', $this->room);
													})
													->count();
		return $result > 0 ? 0 : 1;

	}

}











