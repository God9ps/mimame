<?php

include_once "Class/ConnectBD.class.php";
/**
 * Created by PhpStorm.
 * User: g2060659
 * Date: 26-02-2017
 * Time: 12:19
 */
class Aplicacao extends ConnectBD
{
    private $idAplicacao;
    private $nomeAplicacao;
    private $abreviatura;
    private $descricao;
    private $totalApps;
    private $perfis;

    public function Aplicacao(){
        $this->connection = new ConnectBD();
        $this->connection->ligarBD();
    }

    public function getAppBD($id){
        $returnArray = array();
        $sqlQuery = "SELECT * FROM aplicacao WHERE idAplicacao=".$id;

        $retorno = $this->connection->selectBD($sqlQuery);
        $aplicacoes = $retorno->fetchAll(PDO::FETCH_ASSOC);
        $this->totalApps = $retorno->rowCount();

        $sqlQuery = "SELECT * FROM perfil ORDER BY idAplicacao";
        $retorno = $this->connection->selectBD($sqlQuery);
        $perfis = $retorno->fetchAll(PDO::FETCH_ASSOC);

        foreach ($aplicacoes as $app){
            unset($perfisArray);
            $perfisArray = array();
            foreach ($perfis as $perfil){
                if ($app['idAplicacao'] == $perfil['idAplicacao']){
                    array_push($perfisArray, array(
                        'idPerfil' => $perfil['idPerfil'],
                        'idAplicacao' => $perfil['idAplicacao'],
                        'nomePerfil' => $perfil['nomePerfil'],
                        'ativo' => $perfil['ativo'],
                        'descricao' => $perfil['descricao'],
                        'observacoes' => $perfil['observacoes']
                    ));
                }
            }

            array_push($returnArray, array(
                'idAplicacao' => $app['idAplicacao'],
                'abreviatura' => $app['abreviatura'],
                'nomeAplicacao' => $app['nomeAplicacao'],
                'ativo' => $app['ativo'],
                'descricao' => $app['descricao'],
                'perfil' => $perfisArray
            ));
        }

        $this->idAplicacao   = $app['idAplicacao'];
        $this->nomeAplicacao = $app['nomeAplicacao'];
        $this->abreviatura   = $app['abreviatura'];
        $this->descricao     = $app['idAplicacao'];
        $this->perfis        = $perfisArray;
        return $returnArray;
    }

    public function getNome(){
        echo $this->nomeAplicacao;
    }






}