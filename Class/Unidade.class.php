<?php
require_once "ConnectBD.class.php";

class Unidade extends ConnectBD
{
    private $unidade2nr;
    private $unidade4nr;
    private $unidade6nr;
    private $unidade8nr;
    private $unidade10nr;
    private $unidade12nr;
    private $nome2nr;
    private $nome4nr;
    private $nome6nr;
    private $nome8nr;
    private $nome10nr;
    private $nome12nr;
    private $codUnidade;
    private $nomeUnidade;
    private $abreviatura;
    private $observacoes;
    private $ativo;
    private $endereco;
    private $CP4;
    private $CP3;
    private $CPDesignacao;
    private $TelFixo;
    private $TelFixo1;
    private $TelMovel;
    private $Fax;
    private $Email;
    private $latitude;
    private $longitude;
    private $codDestrito;
    private $codFreguesia;
    private $codConcelhos;
    private $Extensao;

    var $connection;

    function Unidade()
    {
        $this->connection = new ConnectBD();
        $this->connection->ligarBD();
    }

    public function __call($method_name , $parameter) //Logica para o "overloading" da função;
    {
        if ($method_name == "getUnidade")
        {
            $count = count($parameter);
            switch ($count) {
                case "1":
                    //GetUnidade apenas com um parametro (codUnidade)
                    if (strlen($parameter[0])== 8){

                        $this->codUnidade = $parameter[0];

                        $sqlQuery = "SELECT * FROM listaTodasUnidades WHERE codUnidade = $this->codUnidade";
                        $retorno = $this->connection->selectBD($sqlQuery);
                        $result = $retorno->fetchAll(PDO::FETCH_ASSOC);

                        $this->unidade2nr     = $result[0]['unidade2nr'];
                        $this->unidade4nr     = $result[0]['unidade4nr'];
                        $this->unidade6nr     = $result[0]['unidade6nr'];
                        $this->unidade8nr     = $result[0]['unidade8nr'];
                        $this->unidade10nr    = $result[0]['unidade10nr'];
                        $this->unidade12nr    = $result[0]['unidade12nr'];
                        $this->nome2nr        = $result[0]['nome2nr'];
                        $this->nome4nr        = $result[0]['nome4nr'];
                        $this->nome6nr        = $result[0]['nome6nr'];
                        $this->nome8nr        = $result[0]['nome8nr'];
                        $this->nome10nr       = $result[0]['nome10nr'];
                        $this->nome12nr       = $result[0]['nome12nr'];
                        $this->codUnidade     = $result[0]['codUnidade'];
                        $this->nomeUnidade    = $result[0]['nomeUnidade'];
                        $this->abreviatura    = $result[0]['abreviatura'];
                        $this->observacoes    = $result[0]['observacoes'];
                        $this->ativo          = $result[0]['ativo'];
                        $this->endereco       = $result[0]['endereco'];
                        $this->CP4            = $result[0]['CP4'];
                        $this->CP3            = $result[0]['CP3'];
                        $this->CPDesignacao   = $result[0]['CPDesignacao'];
                        $this->TelFixo        = $result[0]['TelFixo'];
                        $this->TelFixo1       = $result[0]['TelFixo1'];
                        $this->TelMovel       = $result[0]['TelMovel'];
                        $this->Fax            = $result[0]['Fax'];
                        $this->Email          = $result[0]['Email'];
                        $this->latitude       = $result[0]['latitude'];
                        $this->longitude      = $result[0]['longitude'];
                        $this->codDestrito    = $result[0]['codDestrito'];
                        $this->codFreguesia   = $result[0]['codFreguesia'];
                        $this->codConcelhos   = $result[0]['codConcelhos'];
                        $this->Extensao       = $result[0]['Extensao'];

                        return $result;
                        break;
                    } else {
                        return "Erro, codigo de unidade inválido";
                    }

                case "6":
                    //GetUnidade apenas com seis parametros (unidade2nr ... unidade12nr)
                    print_r($parameter);
                    $this->unidade2nr  = isset($parameter[0]) ? $parameter[0] : "0";
                    $this->unidade4nr  = isset($parameter[1]) ? $parameter[1] : "0";
                    $this->unidade6nr  = isset($parameter[2]) ? $parameter[2] : "0";
                    $this->unidade8nr  = isset($parameter[3]) ? $parameter[3] : "0";
                    $this->unidade10nr = isset($parameter[4]) ? $parameter[4] : "0";
                    $this->unidade12nr = isset($parameter[5]) ? $parameter[5] : "0";
                    $sqlQuery = "SELECT * FROM listaTodasUnidades WHERE  unidade2nr  = '$this->unidade2nr'  AND unidade4nr  = $this->unidade4nr  AND unidade6nr  = '$this->unidade6nr' AND unidade8nr  = '$this->unidade8nr'  AND unidade10nr = '$this->unidade10nr' AND unidade12nr = '$this->unidade12nr'  ";
                    $retorno = $this->db->SelectBD($sqlQuery);
                    return $retorno;
                    break;
                default:
                    throw new exception("Numero de argumentos incorrecto");
            }
        } else {
            throw new exception("Function $method_name does not exists ");
        }

    }

}