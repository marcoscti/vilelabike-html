<?php

namespace App\Model;

class Cliente
{
    public function insertCliente($data)
    {
        try {
            $sql = "INSERT INTO tb_cliente(nome, cpf, telefone, endereco, bairro, cidade, user_id) VALUES (?,?,?,?,?,?,?)";
            Sql::setData($sql, $data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function deleteCliente($dados)
    {
        try {
            $sql = "DELETE FROM tb_cliente WHERE id=?";
            Sql::setData($sql, [$dados]);
            return true;
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function updateCliente($dados)
    {
        try {
            $sql = "UPDATE tb_cliente SET nome=?,cpf=?,telefone=?,endereco=?,bairro=?,cidade=?,user_id=? WHERE id =?";
            Sql::setData($sql, $dados);
            return true;
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function listCliente()
    {
        $sql = "SELECT * FROM tb_cliente ORDER BY id DESC";
        $list = Sql::getList($sql);
        return $list;
    }

    public function buscarCliente($cpf)
    {
        try {
            $sql = "SELECT * FROM tb_cliente WHERE cpf = ?";
            $list = Sql::getData($sql, [$cpf]);
            return $list;
        } catch (\Exception $e) {
            echo "ERRO: " . $e;
        }
    }
}