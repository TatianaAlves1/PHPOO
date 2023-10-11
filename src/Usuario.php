<?php

class Usuario{
    //idusuario | nome | email | img | cadastro| tipoUser

    private $idusuario;
    private $nome;
    private $email;
    private $img;
    private $dataCad;
    private $tipoUser;
    private $senha;


    public function __construct(int $idusuario, string $nome, string $imagem,string $email,  string $tipo,string $senha, string $dataCad){
        $this->idusuario = $idusuario;
        $this->nome = $nome;
        $this->img = $imagem;
        $this->email = $email;
        $this->tipoUser = $tipo;
        $this->senha = $senha;
        $this->dataCad = $dataCad;
        
    }

    /**
     * Get the value of idusuario
     */
    public function getIdusuario(): int
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     */
    public function setIdusuario(int $idusuario): self
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * Set the value of img
     */
    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of dataCad
     */
    public function getDataCad(): string
    {
        return $this->dataCad;
    }

    /**
     * Set the value of dataCad
     */
    public function setDataCad(string $dataCad): self
    {
        $this->dataCad = $dataCad;

        return $this;
    }

    /**
     * Get the value of tipoUser
     */
    public function getTipoUser(): string
    {
        return $this->tipoUser;
    }

    /**
     * Set the value of tipoUser
     */
    public function setTipoUser(string $tipoUser): self
    {
        $this->tipoUser = $tipoUser;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha($senha): self
    {
        $this->senha = $senha;

        return $this;
    }
}