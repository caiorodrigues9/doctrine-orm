<?php

use Caio\Doctrine\Entity\Curso;
use Caio\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__."/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$curso = new Curso;

$curso->setCurso($argv[1]);

$entityManager->persist($curso);
$entityManager->flush();