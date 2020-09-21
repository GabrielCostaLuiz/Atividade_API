<?php

class Paciente {

    public $idpaciente;
    public $nome;
    public $email;
    public $sexo;
    public $usuario;
    public $senha;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function listar(){
        $consulta = "select * from tbpaciente";

        $stmt=$this->conexao->prepare($consulta);

        $stmt->execute();

        return $stmt;
    }

        

    public function cadastro(){
        $consulta = " insert into tbpaciente set nome=:n, email=:e, sexo=:sx, usuario=:u, senha=:s";
    
        $stmt=$this->conexao->prepare($consulta);

        $this->senha = md5($this->senha);

        $stmt->bindParam(":n",$this->nome);
        $stmt->bindParam(":e",$this->email);
        $stmt->bindParam(":sx",$this->sexo);
        $stmt->bindParam(":u",$this->usuario);
        $stmt->bindParam(":s",$this->senha);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
        

    public function atualizar(){
        $consulta = "update tbpaciente set nome=:n, email=:e, sexo=:sx, usuario=:u, senha=:s where idpaciente=:id";
    
        $stmt=$this->conexao->prepare($consulta);

        $this->senha = md5($this->senha);

        $stmt->bindParam(":n",$this->nome);
        $stmt->bindParam(":e",$this->email);
        $stmt->bindParam(":sx",$this->sexo);
        $stmt->bindParam(":u",$this->usuario);
        $stmt->bindParam(":s",$this->senha);
        $stmt->bindParam(":id",$this->idpaciente);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

        

    public function deletar(){
        $consulta = " delete from tbpaciente where idpaciente=:id";
    
        $stmt=$this->conexao->prepare($consulta);

        $stmt->bindParam(":id",$this->idpaciente);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


}

?>