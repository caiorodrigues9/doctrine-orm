<?php

use Caio\Doctrine\Entity\Aluno;
use Caio\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__."/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    echo "ID {$aluno->getId()}, Nome: {$aluno->getNome()}".PHP_EOL.PHP_EOL;
}

echo $alunoRepository->find(1)->getNome().PHP_EOL.PHP_EOL;
/*
echo $alunoRepository->findOneBy([
    'nome' => "Teste"
])->getNome();
*/