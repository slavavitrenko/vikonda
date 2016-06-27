<?php

namespace app\controllers\user;


class SecurityController extends \dektrium\user\controllers\SecurityController
{
	public function init(){
		parent::init();
		$this->layout = '@app/views/layouts/thin';
	}
}