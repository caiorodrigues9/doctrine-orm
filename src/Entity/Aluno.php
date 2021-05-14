<?php

namespace Caio\Doctrine\Entity;


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
}