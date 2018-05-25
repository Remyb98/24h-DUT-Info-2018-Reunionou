<?php

require_once 'model/Manager.php';
require_once 'model/UserManager.php';

function index() {
	if (Manager::checkUserLoggedIn($_SESSION)) {
		// TODO: information about user (like event)
		require_once 'view/indexView.php';
	} else {
		require_once 'view/indexView.php';
	}
}

function register() {
	if (Mangager::checkUserLoggedIn($_SESSION)) {
		require_once 'view/indexView.php';
	} else {
		require_once 'view/registerView.php';
	}
}

function auth($data) {
	if (!empty($data['login']) || !empty($data['pwd'])) {
		header('Location: index.php');
	} else {
		$manager = new UserManager();
		$manager->connectUser($data['login'], $data['pwd']);
		header('Location: index.php');
	}
}