<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{

	/*
	$reservation = [
			"client" => [
							"firstName" => "Pedro",
							"lastName" => "Carmona",
							"fullName" => "Pedro Carmona",
							"email" => "mdiasloureiro@gmail.com",
							"bi" => "13179549",
							"phone" => "911951249"
						],
			
						"reservationDate" => time(),
						"checkin" => "1385892000",
						"checkout" => "1386421200",
						"roomtitle" => "Quarto A - Apartamento 3",
						"roomID" => "1",
						"status" => "pending",
						"price" => "120.00",

	];


	EasyBooking::reservationManager()->insert($reservation);
	

	$start = strtotime(date('Y-m-d H:i:s',strtotime('2013-12-01 10:00:00')));
	$end = strtotime(date('Y-m-d H:i:s',strtotime('2013-12-07 13:00:00')));

	echo $start;echo "<br />";
	echo $end;echo "<br />";

	echo "availability: " . EasyBooking::reservation()->availability(1, $start,  $end) ."<br />";

	$reservations = EasyBooking::reservation()->latest(2);


	foreach($reservations as $res) 
	{
		print_r($res);
		echo "<br /><hr />";
	}
	*/

	/*

	$reservations = EasyBooking::ReservationManager()->all();

	foreach($reservations as $res) 
	{
		print_r($res);
		echo "<br /><hr />";
	}

	*/

	/*
	$reservation = EasyBooking::ReservationManager()->get("529a4f0d7cb393e4070041ad");

	if($reservation) {

		echo $reservation->_id;
		$reservation->delete();
	} else {
		echo "false";
	}
	*/

	
	$reservation = EasyBooking::ReservationManager()->create();

	$clientArray = ['firstName' => 'Pedro Carmona','lastName' => 'Sousa','fullName' => 'Pedro Carmona Sousa',
				'email' => 'pcarmona@gmail.com', 'cardID' => '23131549', 'phone' => '964769899'];

	$reservation->client = $clientArray;
	
	/*
	$reservation->client['firstName'] = 'Pedro Carmona';
	$reservation->client['lastName'] = 'Sousa';
	$reservation->client['fullName'] = 'Pedro Carmona Sousa';
	$reservation->client['email'] = 'pcarmona@gmail.com';
	$reservation->client['cardID'] = '23131549';
	$reservation->client['phone'] = '964769899';
	*/

	$reservation->reservationDate = time();
	$reservation->checkin = "1385893000";
	$reservation->checkout = "1386421400";
	$reservation->roomTitle = "Quarto B - Apartamento 1";
	$reservation->roomID = "2";
	$reservation->status = "pending";
	$reservation->price = "370.00";
	$reservation->totalPersons = "1";

	if($reservation->save()) {
		echo $reservation->_id;
	} else {
		echo "room not available";
	}
	
});