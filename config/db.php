<?php
if (YII_ENV_DEV) 
{
	return [
    	'class' => 'yii\db\Connection',
    	'dsn' => 'mysql:host=localhost;dbname=salute',
    	'username' => 'root',
    	'password' => '',
    	'charset' => 'utf8',
	];
}
else
{
	return [
    	'class' => 'yii\db\Connection',
    	'dsn' => 'mysql:host=salute-intra.mysql.uhserver.com;dbname=salute_intra',
    	'username' => 'salute_prod',
    	'password' => 'linguica7102*',
    	'charset' => 'utf8',
	];
}
