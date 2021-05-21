<?php

namespace Caio\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/** 
 * @Entity
 */
class Aluno 
{
    /** 
     * @Id
     * @generatedValue
     * @Column(type="integer")
     */
    private int $id;


    /** 
     * @Column(type="string")
     */
    private string $nome;
    /**
     * @OneToMany(targetEntity="Telefone",mappedBy="aluno", cascade={"remove","persist"}, fetch="EAGER")
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso",mappedBy="alunos", cascade={"remove","persist"})
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setNome(string $nome):self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones():Collection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso): self
    {
        if ($this->cursos->contains($curso)) {
            return $this;
        }
        
        $this->cursos->add($curso);
        $curso->addAluno($this);
        return $this;
    }

    public function getCursos():Collection
    {
        return $this->cursos;
    }

}