<?php

namespace MWP\Model;

/**
 * Interface Output
 * @package MWP\Model
 */
interface Output
{
	/**
	 * @param $parameter
	 * @param string $encoding
	 * @return mixed
	 */
	public function cleanOutput($parameter, $encoding = 'utf-8');
}
