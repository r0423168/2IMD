<?php 
    class ArtistTrack{
        public static function getTracksByAlbumId($id){
            try{
                $conn = new PDO("mysql:host=localhost;dbname=spotify_faker", "root", "root");
                $statement = $conn->prepare("SELECT * FROM tracks WHERE album_id = :id");
                $statement->bindParam(":id", $id);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch( Throwable $t ){
                return false;
            }
         }
    }
?>