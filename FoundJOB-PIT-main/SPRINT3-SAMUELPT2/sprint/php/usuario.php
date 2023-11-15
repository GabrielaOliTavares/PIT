<?php
class Usuario{

    private $cpf = 0;
    private $nome = "";
    private $email = "";
    private $datanascimento = 0;
    private $senha= "";

    public function __construct($cpf, $nome, $email, $dataNascimento, $senha)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->dataNascimento  = $dataNascimento;
        $this->senha  = $senha;

    }


    public function get_cpf(){
        return $this->cpf;
    }

    public function get_nome(){
        return $this->nome;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_dataNascimento(){
        return $this->dataNascimento;
    }

    public function get_senha(){
        return $this->senha;
    }

    public function salvar(){
        if($this->cpf < ""){
            return "cpf é obrigatorio!!";
        }

        $con = new mysqli("localhost", "root", "", "estagiosPIT");
        $stmt = $con->prepare("INSERT INTO cadastroUsuario(cpf, nome, email, dataNascimento, senha) VALUES (?,?,?,?,?)");
        $stmt->bind_param("issis", $this->cpf, $this->nome, $this->email, $this->dataNascimento, $this->senha);
        $stmt->execute();
        $stmt->close();
        $con->close();

    }
}
?>