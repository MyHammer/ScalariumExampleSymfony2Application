<?php

include_once(__DIR__ . '/../../scalarium.php');
$scalarium = new Scalarium();

$container->setParameter('database_driver',  'pdo_mysql');
$container->setParameter('database_host',     $scalarium->db->host);
$container->setParameter('database_port',     '3306');
$container->setParameter('database_name',     $scalarium->db->database);
$container->setParameter('database_user',     $scalarium->db->username);
$container->setParameter('database_password', $scalarium->db->password);
$container->setParameter('database_path',     null);

unset($scalarium);
