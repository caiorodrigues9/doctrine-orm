<?php

namespace Caio\Doctrine\Repository;

use Caio\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $query = $this->createQueryBuilder("a")
            ->join('a.telefones','t')
            ->join('a.cursos','c')
            ->addSelect('t')
            ->addSelect('c')
            ->getQuery();

        return $query->getResult();
    }

}