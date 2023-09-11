<?php

require_once 'src/Entities/PlayerCard.php';

class PlayerCardModel
{
    private PDO $db;


    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getPlayerCardById(int $id): PlayerCard|false
    {
        $query = $this->db->prepare("SELECT * FROM `PremierLeagueCards`WHERE `id` = :id;");
        $query->bindParam(':id', $id);

        $query->execute();
        
        $dbPlayer = $query->fetch();

        if(!$dbPlayer){
            return false;
        }
        $Player = new PlayerCard(
            $dbPlayer['id'],
            $dbPlayer['PlayerName'],
            $dbPlayer['Club'],
            $dbPlayer['Position'],
            $dbPlayer['Defence'],
            $dbPlayer['Control'],
            $dbPlayer['Attach'],
            $dbPlayer['Total'],
            $dbPlayer['role_id']
        );
        return $Player;
    }

    }