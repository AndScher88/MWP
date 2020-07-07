<?php

namespace MWP\Model;

interface Output
{
	public function cleanOutput($parameter, $encoding='utf-8');
}