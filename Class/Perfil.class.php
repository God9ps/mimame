<?php
include_once "Class/ConnectBD.class.php";
/**
 * Created by PhpStorm.
 * User: g2060659
 * Date: 26-02-2017
 * Time: 11:23
 */
class Perfil extends Aplicacao
{
    private $idPerfil;
    private $nomePerfil;
    private $idAplicacao;
    private $descricao;
    private $observacoes;

    var $connection;

    public function Perfil(){
        $this->connection = new ConnectBD();
        $this->connection->ligarBD();
    }

    public function getPerfisBD(){
        $sqlQuery = "SELECT * FROM perfil ORDER BY idAplicacao";
        $retorno = $this->connection->selectBD($sqlQuery);
        $result = $retorno->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}