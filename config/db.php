<?php
if (YII_ENV_DEV) 
{
	return [
    	'class' => 'yii\db\Connection',
    	'dsn' => 'mysql:host=localhost;dbname=salute',
    	'username' => 'root',
    	'password' => '123',
    	'charset' => 'utf8',
	];
}
else
{
	return [
    	'class' => 'yii\db\Connection',
    	'dsn' => 'mysql:host=45.33.29.22;dbname=salute',
    	'username' => 'root',
    	'password' => 'Dk9xiMqELvnI',
    	'charset' => 'utf8',
	];
}
