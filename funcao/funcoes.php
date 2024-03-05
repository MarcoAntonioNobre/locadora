<?php
function listarTabela($campos, $tabela, $campoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem ");
        //$sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function verificarEmail($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela");
        //$sqlListaTabelas->bindValue(1, $email, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function ativar($tabela,$campo,$ativo,$condicao)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("UPDATE $tabela SET $campo = '$ativo' WHERE $condicao");
        //$sqlListaTabelas->bindValue(1, $email, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarAula($condicao)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaAula = $conn->prepare("SELECT * FROM aula a 
        INNER JOIN curso c ON c.idcurso = a.idcurso 
        INNER JOIN aluno al ON al.idaluno = a.idaluno 
        INNER JOIN professor p ON p.idprofessor = a.idprofessor 
        WHERE p.idprofessor = ? ");
        $sqlListaAula->bindValue(1, $condicao, PDO::PARAM_INT);
        $sqlListaAula->execute();
        $conn->commit();
        if ($sqlListaAula->rowCount() > 0) {
            return $sqlListaAula->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}



function verificarUser($campos, $tabela, $campoBdEmail, $campoEmail, $campoBdSenha, $campoSenha, $campoBdAtivo, $campoAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdEmail = ? AND $campoBdSenha = ? AND $campoBdAtivo = ?");
        $sqlverificar->bindValue(1, $campoEmail, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $campoSenha, PDO::PARAM_STR);
        $sqlverificar->bindValue(3, $campoAtivo, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch
    (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}





function cadCliente($nome,$nascimento,$cpf,$dataatual)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("INSERT INTO cliente (nome,nascimento,cpf,cadastro) VALUES (?,?,?,?)");
        $sqlverificar->bindValue(1, $nome, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $nascimento, PDO::PARAM_STR);
        $sqlverificar->bindValue(3, $cpf, PDO::PARAM_STR);
        $sqlverificar->bindValue(4, $dataatual, PDO::PARAM_STR);
        $sqlverificar->execute();
        $idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return true;
            //return $idRetorno;
            //return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function editCliente($nome,$nascimento,$cpf,$id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("UPDATE cliente SET nome = ?, nascimento = ?, cpf= ? WHERE idcliente = ?");
        $sqlverificar->bindValue(1, $nome, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $nascimento, PDO::PARAM_STR);
        $sqlverificar->bindValue(3, $cpf, PDO::PARAM_STR);
        $sqlverificar->bindValue(4, $id, PDO::PARAM_STR);
        $sqlverificar->execute();
        $idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return true;
            //return $idRetorno;
            //return $sqlverificar->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function apagarCliente($apagar)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("DELETE FROM cliente WHERE idcliente = ?");
        $sqlverificar->bindValue(1, $apagar, PDO::PARAM_INT);
        $sqlverificar->execute();
        $idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return true;
            //return $idRetorno;
            // return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}




function cadGenero($genero,$dataatual)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("INSERT INTO genero (nome,cadastro) VALUES (?,?)");
        $sqlverificar->bindValue(1, $genero, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $dataatual, PDO::PARAM_STR);
        $sqlverificar->execute();
        $idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return $idRetorno;
            // return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function editGenero($genero,$id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("UPDATE genero SET nome = ? WHERE idgenero = ?");
        $sqlverificar->bindValue(1, $genero, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $id, PDO::PARAM_STR);
        $sqlverificar->execute();
        //$idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            //return $idRetorno;
            return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function apagarGenero($apagar)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("DELETE FROM genero WHERE idgenero = ?");
        $sqlverificar->bindValue(1, $apagar, PDO::PARAM_INT);
        $sqlverificar->execute();
        $idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return true;
            //return $idRetorno;
            // return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function cadFilme($slcgenero, $classificacao,$nomeFilme, $diretor, $dataLancamento, $dataatual)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("INSERT INTO filme (idgenero,idclassificacao,nomeFilme,diretor,dataLancamento,cadastro) VALUES (?,?,?,?,?,?)");
        $sqlverificar->bindValue(1, $slcgenero, PDO::PARAM_INT);
        $sqlverificar->bindValue(2, $classificacao, PDO::PARAM_INT);
        $sqlverificar->bindValue(3, $nomeFilme, PDO::PARAM_STR);
        $sqlverificar->bindValue(4, $diretor, PDO::PARAM_STR);
        $sqlverificar->bindValue(5, $dataLancamento, PDO::PARAM_STR);
        $sqlverificar->bindValue(6, $dataatual, PDO::PARAM_STR);
        $sqlverificar->execute();
        $idRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            return $idRetorno;
            // return $sqlverificar->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}



function verificarSenhaCriptografia($campos, $tabela, $campoBdEmail, $campoEmail, $campoBdSenha, $campoSenha, $campoBdAtivo, $campoAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdEmail = ? AND $campoBdAtivo = ?");
        $sqlverificar->bindValue(1, $campoEmail, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $campoAtivo, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            $retornoSql = $sqlverificar -> fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql -> $campoBdSenha;
            if(password_verify($campoSenha, $senha_hash)){
                return $retornoSql;
            }else{
                return 'senha';
            }
        } else {
            return 'usuario';
        }
        return null;
    } catch (Throwable $e) {
        
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}