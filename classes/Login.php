<?php

class Login extends DB
{
    public function logar($email, $senha)
    {
        $sql  = "SELECT * FROM 	usuarios WHERE email = :email AND senha = :senha";
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount()==1) {
            $dados = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['administrador'] = array( 'id' => $dados->id, 'nome' => $dados->nome );
            $_SESSION['logado'] = true;

            return true;
        } else {
            return false;
        }
    }

    public static function deslogar()
    {
        if (isset($_SESSION['logado'])) {
            unset($_SESSION['logado']);
            session_destroy();

            header("Location: index.php");
        }
    }
}
