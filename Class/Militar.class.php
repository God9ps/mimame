<?php
require_once "ConnectBD.class.php";


class Militar extends ConnectBD{

    private $mecanografico;
    private $nome;
    private $posto;
    private $email;
    private $activo;
    private $unidade2nr;
    private $unidade4nr;
    private $unidade6nr;
    private $unidade8nr;
    private $unidade10nr;
    private $unidade12nr;
    private $nomeUnidade;
    private $codUnidade;
    private $tblColocacao;
    private $perfBosg;
    private $nomePerfBosg;
    private $hierarquiaBosg;

    var $connection;

    function Militar(){
        #inicializa a ligação à base de dados para a classe Militar

        $this->connection = new ConnectBD();
        $this->connection->ligarBD();
    }

    /**
     * @return mixed
     */
    public function getMecanografico()
    {
        return $this->mecanografico;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getPosto()
    {
        return $this->posto;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @return mixed
     */
    public function getUnidade2nr()
    {
        return $this->unidade2nr;
    }

    /**
     * @return mixed
     */
    public function getUnidade4nr()
    {
        return $this->unidade4nr;
    }

    /**
     * @return mixed
     */
    public function getUnidade6nr()
    {
        return $this->unidade6nr;
    }

    /**
     * @return mixed
     */
    public function getUnidade8nr()
    {
        return $this->unidade8nr;
    }

    /**
     * @return mixed
     */
    public function getUnidade10nr()
    {
        return $this->unidade10nr;
    }

    /**
     * @return mixed
     */
    public function getUnidade12nr()
    {
        return $this->unidade12nr;
    }

    /**
     * @return mixed
     */
    public function getNomeUnidade()
    {
        return $this->nomeUnidade;
    }

    /**
     * @return mixed
     */
    public function getCodUnidade()
    {
        return $this->codUnidade;
    }

    /**
     * @return mixed
     */
    public function getTblColocacao()
    {
        return $this->tblColocacao;
    }

    function setMilitar($mecanografico){
        $this->mecanografico = $mecanografico;
    }

    public function getDadosMilitar(){

        $sqlQuery = "SELECT * FROM viewAllPerfil WHERE mecanografico = $this->mecanografico";
        $retorno = $this->connection->selectBD($sqlQuery);
        $result = $retorno->fetchAll(PDO::FETCH_ASSOC);
//        print_r($retorno);

        $this->mecanografico = $result[0]['mecanografico'];
        $this->nome          = $result[0]['nome'];
        $this->posto         = $result[0]['nomePosto'];
        $this->email         = $result[0]['email'];
        $this->activo        = $result[0]['ativo'];
        $this->unidade2nr    = $result[0]['unidade2nr'];
        $this->unidade4nr    = $result[0]['unidade4nr'];
        $this->unidade6nr    = $result[0]['unidade6nr'];
        $this->unidade8nr    = $result[0]['unidade8nr'];
        $this->unidade10nr   = $result[0]['unidade10nr'];
        $this->unidade12nr   = $result[0]['unidade12nr'];
        $this->nomeUnidade   = $result[0]['nomeUnidade'];
        $this->codUnidade    = $result[0]['codUnidade'];
        $this->tblColocacao  = $this->getColocacao();
        $this->perfBosg      = $result[0]['perfBosg'];
        $this->nomePerfBosg  = $result[0]['nomePerfil'];
        $this->hierarquiaBosg= $result[0]['hierarquia'];
        return $retorno;
    }

    /**
     * @return mixed
     */
    public function getPerfBosg()
    {
        return $this->perfBosg;
    }

    /**
     * @return mixed
     */
    public function getNomePerfBosg()
    {
        return $this->nomePerfBosg;
    }

    /**
     * @return mixed
     */
    public function getHierarquiaBosg()
    {
        return $this->hierarquiaBosg;
    }

    public function criaMilitar($array){

//        $values = implode(', ', array_keys($array));
//        $keys   = "'".implode("', '",array_values($array))."'";
//
//        $sqlQuery = "INSERT INTO new_table ($keys) VALUES ($values)";
//        $array = array('João Morgadinho', 'guarda principal');

        $sqlQuery = "INSERT INTO new_table (nomeTeste, postoTeste) VALUES (:nome, :posto) ";

     echo "Res " . $this->connection->InsertBD($sqlQuery, $array);
    }

    private function getColocacao(){
        if(!isset($this->unidade2nr)){
            $this->GetDadosMilitar();
        }
        $colocacao = 0;
        if ($this->unidade2nr != 0){
            #colocação é 2nr;
            $colocacao = 2;
            if ($this->unidade4nr != 0){
                #colocação é 4nr;
                $colocacao = 4;
                if ($this->unidade6nr != 0){
                    #colocação é 6nr;
                    $colocacao = 6;
                    if ($this->unidade8nr != 0){
                        #colocação é 8nr;
                        $colocacao = 8;
                        if ($this->unidade10nr != 0){
                            #colocação é 10nr;
                            $colocacao = 10;
                            if ($this->unidade12nr != 0){
                                #colocação é 12nr;
                                $colocacao = 12;
                            }
                        };};};};};
        return $colocacao;
    }

}