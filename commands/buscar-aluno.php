<?php

use Caio\Doctrine\Entity\Aluno;
use Caio\Doctrine\Entity\Telefone;
use Caio\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__."/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();


$dql = "SELECT aluno FROM Caio\\Doctrine\\Entity\\Aluno aluno WHERE aluno.id = 1 OR aluno.nome LIKE '%Teste%'";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    
    $telefones = $aluno->
    getTelefones()
    ->map(function (Telefone $telefone){
        return $telefone->getNumero();
    })
    ->toArray();

    echo "ID {$aluno->getId()}, Nome: {$aluno->getNome()} ";
    echo "Telefones: ".implode(" , ",$telefones).PHP_EOL.PHP_EOL;
}

//echo $alunoRepository->find(1)->getNome().PHP_EOL.PHP_EOL;
/*
echo $alunoRepository->findOneBy([
    'nome' => "Teste"
])->getNome();
*/