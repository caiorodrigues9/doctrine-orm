<?php


namespace Caio\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/** 
 * @Entity
 */
class Curso 
{
    /** 
     * @Id
     * @generatedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $curso;
    
    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function __construct()
    {
        $this->aluno = new ArrayCollection();
    }

    public function getId():int 
    {
        return $this->id;
    }

    public function getCurso():string
    {
        return $this->curso;
    }

    public function setCurso(string $curso):self
    {
        $this->curso = $curso;
        return $this;
    }

    public function addAluno(Aluno $aluno):self
    {
        if ($this->alunos->contains($aluno)) {
            return $this;
        }
        $this->alunos->add($aluno);
        $aluno->addCurso($this);
        return $this;
    }

    public function getAlunos():Collection
    {
        return $this->alunos;
    }

}