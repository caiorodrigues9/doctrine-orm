<?php

use Caio\Doctrine\Entity\Aluno;
use Caio\Doctrine\Entity\Curso;
use Caio\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__."/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

/**
 * @var Curso $curso;
 */
$curso = $entityManager->find(Curso::class,$idCurso);

/**
 * @var Aluno $aluno;
 */
$aluno = $entityManager->find(Aluno::class,$idAluno);

$curso->addAluno($aluno);

$entityManager->flush();