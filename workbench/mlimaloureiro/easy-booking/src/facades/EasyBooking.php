<?php namespace Mlimaloureiro\EasyBooking\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class EasyBooking extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'easybooking'; }
 
}