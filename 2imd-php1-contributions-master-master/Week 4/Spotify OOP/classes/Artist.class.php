<?php 
class Artist{
    public static function getArtists(){
        try{
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM artists");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch( Throwable $t ){
            return $t;
        }
    }
    public static function getArtistById($id){
        try{
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM artists WHERE id = :id LIMIT 1;");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result["name"];
        }
        catch( Throwable $t ){
            return $t;
        }
    }
}