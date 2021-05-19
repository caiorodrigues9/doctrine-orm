<?php

use Caio\Doctrine\Entity\Aluno;
use Caio\Doctrine\Entity\Telefone;
use Caio\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__."/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno;

$aluno->setNome($argv[1]);

for ( $i=2; $i<$argc; $i++ ) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);
    $aluno->addTelefone($telefone);
}

$entityManager->persist($aluno);

$entityManager->flush();