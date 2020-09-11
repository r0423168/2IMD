<?php
 class Album{

     public static function getAlbumsByArtistId($id){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=spotify_faker", "root", "root");
            $statement = $conn->prepare("SELECT * FROM albums WHERE artist_id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch( Throwable $t ){
            return false;
        }
     }
     public static function getAlbumById($id){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=spotify_faker", "root", "root");
            $statement = $conn->prepare("SELECT * FROM albums WHERE id = :id LIMIT 1;");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result["title"];
        }
        catch( Throwable $t ){
            return $t;
        }
     }
 }