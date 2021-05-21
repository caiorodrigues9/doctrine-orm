<?php

use Caio\Doctrine\Entity\Aluno;
use Caio\Doctrine\Entity\Telefone;
use Caio\Doctrine\Helper\EntityManagerFactory;
use Caio\Doctrine\Repository\AlunoRepository;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__."/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$alunoRepository = $entityManager->getRepository(Aluno::class);

$alunos = $alunoRepository->buscaCursosPorAluno();

foreach ($alunos as $aluno) {
    $telefones = $aluno
            ->getTelefones()
            ->map( function (Telefone $telefone) {
                return $telefone->getNumero();
            })
            ->ToArray();
    //var_dump($telefones);die;
    echo "ID: ".$aluno->getId().PHP_EOL;
    echo "Nome: ".$aluno->getNome().PHP_EOL;
    echo "Telefones: ".implode(" / ",$telefones).PHP_EOL;
    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "\tID Curso: ".$curso->getId().PHP_EOL;
        echo "\tCurso: {$curso->getCurso()}".PHP_EOL;
        echo PHP_EOL;
    }
    
    echo PHP_EOL;

}

echo PHP_EOL;

foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'].PHP_EOL;
}