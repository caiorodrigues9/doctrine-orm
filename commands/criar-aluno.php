<?php

use Caio\Doctrine\Entity\Aluno;
use Caio\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__."/../vendor/autoload.php";

$aluno = new Aluno;

$aluno->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($aluno);

$entityManager->flush();