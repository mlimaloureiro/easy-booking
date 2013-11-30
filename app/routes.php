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
						"checkIn" => "1385892000",
						"checkOut" => "1386421200",
						"roomTitle" => "Quarto A - Apartamento 3",
						"roomID" => "1"
	];


	EasyBooking::reservation()->insert($reservation);
	*/

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


});