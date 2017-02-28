<?php
include_once "const.php";

class ConnectBD {

    var $connection;

    function ligarBD(){

        global $DB_host,$DB_user,$DB_pass,$DB_name;

#ligação PDO
        try{

            $this->connection = new PDO("mysql:host=$DB_host;dbname=$DB_name;charset=utf8",$DB_user,$DB_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "ligação realizada com sucesso";
            return $this->connection;

        } catch(PDOException $e){
            echo "Erro: noa foi possivel realizar a ligação";
            return 'ERROR: ' . $e->getMessage();
        }

    }

    function selectBD($sqlQuery){
        try {

            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();

//            /* Fetch all of the values of the first column */
//            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//            return $result;

            return $stmt;



        } catch (Exception $e){
            echo "Erro:" . $e->getMessage();
        }
    }

    function CountLinhasBD($sqlQuery){
        try {
            $query = mysqli_query($this->connection, $sqlQuery);
            $result = mysqli_fetch_array($query);
        } catch (Exception $e){
            echo "Erro:" . $e->getMessage();
        }
        if($result){
            return true;
        } else {
            return false;
        }

    }

    function InsertBD($sqlQuery, $array){

        $this->connection->beginTransaction();

        try {

            $stmt = $this->connection->prepare($sqlQuery);
            foreach ($array as $valores){
                $stmt->bindParam(':nome',  $valores[0]);
                $stmt->bindParam(':posto', $valores[1]);
                $stmt->execute();
            }

            $this->connection->commit();
            return "Sucesso";

        } catch (PDOException $e){

            echo "Erro 1:" . $e->getMessage();
            $this->connection->rollBack();

        }
        catch (Exception $e){

            echo "Erro 2:" . $e->getMessage();
            $this->connection->rollBack();

        }

    }

    function UpdateBD($sqlQuery){
        try {
            mysqli_query($this->connect, $sqlQuery);
            echo "Dados alterados com sucesso";
        } catch (Exception $e){
            echo "Erro:" . $e->getMessage();
        }
    }

    function DeleteBD($sqlQuery){
        try {
            mysqli_query($this->connect, $sqlQuery);
        } catch (Exception $e){
            echo "Erro:" . $e->getMessage();
        }
    }

}