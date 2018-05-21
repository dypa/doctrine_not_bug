<?php

include 'bootstrap.php';

$entityManager->getConnection()->prepare("SET FOREIGN_KEY_CHECKS = 0;")->execute();
$entityManager->getConnection()->prepare('TRUNCATE TABLE links;')->execute();
$entityManager->getConnection()->prepare('TRUNCATE TABLE items;')->execute();
$entityManager->getConnection()->prepare("SET FOREIGN_KEY_CHECKS = 1;")->execute();

$item1 = new Item();
$entityManager->persist($item1);
$item2 = new Item();
$entityManager->persist($item2);
$item3 = new Item();
$entityManager->persist($item3);
$item4 = new Item();
$entityManager->persist($item4);

$link = new Link();
$link->setFrom($item1);
$link->setTo($item2);
$entityManager->persist($link);
$link = new Link();
$link->setFrom($item3);
$link->setTo($item4);
$entityManager->persist($link);

$entityManager->flush();

try {
	$query = $entityManager->createQuery(
		'SELECT l.from, l.to FROM Link l WHERE l.from IN (:items) OR l.to IN (:items)'
	);
	$query->setParameter('items', [$item1->getId(), $item3->getId()]);

	var_dump($query->getSQL());

	$result = $query->getScalarResult();

	var_dump($result);
} catch(Exception $e) {
	var_dump($e->getMessage());
}