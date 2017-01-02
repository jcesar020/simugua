<?php
/**
 * Author: whipstercz
 */

namespace simuaagua\Services\Inspinia\Facade;


use Illuminate\Support\Facades\Facade;

class InspiniaForm extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'inspiniaForm'; }
}