<?php

    class Connect{

        define('HOST', 'aline.mysql.dbaas.com.br');
        define('DBNAME', 'Everymind');
        define('USER', 'aline17figueiredo');
        define('PASSWORD', 'Aff17@aline');
    
        class Connect{
            protected $connection;
    
            function __construct(){
                $this->connectDatabase();
            }
    
            private function connectDatabase(){
                try 
                {
                    $this->connection = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
                } 
                catch (PDOException $e) 
                {
                    echo "Error to connect with Database!".$e->getMessage();
                    die();
                }
            } 
    
        }

    }

    class PacientesModel extends Connect{
        

        private $table;

        $this->table = "produtos";



        function __construct(){
            parent::__construct();
            $this->table = "pacientes";
        }

        public function insert($data){
            $sqlUpdate = "INSERT INTO $this->table (NomeProduto, CodigoProduto, DescricaoProduto, PrecoProduto) VALUES (:NomeProduto, :CodigoProduto, :DescricaoProduto, PrecoProduto)";
            $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['NomeProduto'=>$data['NomeProduto'],'CodigoProduto'=>$data['CodigoProduto'],'DescricaoProduto'=>$data['DescricaoProduto','PrecoProduto'=>$data['PrecoProduto']]);
            return $this->verifyReturn($resultQuery);
        }


        public function update($data){
            $sqlUpdate = "UPDATE $this->table SET NomeProduto = :NomeProduto, DescricaoProduto = :DescricaoProduto, PrecoProduto = :PrecoProduto WHERE CodigoProduto = :CodigoProduto";
            $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['CodigoProduto'=>$data['CodigoProduto'],'NomeProduto'=>$data['NomeProduto'],'DescricaoProduto'=>$data['DescricaoProduto'],'PrecoProduto'=>$data['PrecoProduto']]);
            return $this->verifyReturn($resultQuery);
        }

        public function delete($CodigoProduto){ 
            $sqlDelete = "DELETE FROM $this->table WHERE CodigoProduto = :CodigoProduto";
            $resultQuery = $this->connection->prepare($sqlDelete)->execute(['CodigoProduto'=>$CodigoProduto]);
            return $this->verifyReturn($resultQuery);
        }

        public function selectAll(){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function selectNomeProduto($data){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE NomeProduto LIKE '%$data%' ");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

    }

?>
