<?php

require_once 'src/Entities/PlayerCard.php';

class PlayerCardModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getPlayerCardById(int $id): PlayerCard|false
    {
        $query = $this->db->prepare("SELECT 
        `PremierLeagueCards`.`id`, 
        `PremierLeagueCards`.`PlayerName`,
        `PremierLeagueCards`.`Club`, 
        `Positions`.`PositionName`, 
        `PremierLeagueCards`.`Defence`, 
        `PremierLeagueCards`.`Control`, 
        `PremierLeagueCards`.`Attack`, 
        `PremierLeagueCards`.`Total` 
        FROM `PremierLeagueCards` 
        INNER JOIN `Positions` 
        ON `PremierLeagueCards`.`Position` = `Positions`.`id` 
        WHERE `PremierLeagueCards`.`id` = :id;");

        $query->bindParam(':id', $id);

        $query->execute();

        $dbPlayer = $query->fetch();

        if (!$dbPlayer) {
            return false;
        }

        $Player = new PlayerCard(
            $dbPlayer['id'],
            $dbPlayer['PlayerName'],
            $dbPlayer['Club'],
            $dbPlayer['PositionName'],
            $dbPlayer['Defence'],
            $dbPlayer['Control'],
            $dbPlayer['Attack'],
            $dbPlayer['Total']
        );

        return $Player;
    }

    public function getAllCards(): array
    {
        $query = $this->db->prepare(
            "SELECT `PremierLeagueCards`.`id`, 
            `PremierLeagueCards`.`PlayerName`, 
            `PremierLeagueCards`.`Club`, 
            `Positions`.`PositionName`, 
            `PremierLeagueCards`.`Defence`, 
            `PremierLeagueCards`.`Control`, 
            `PremierLeagueCards`.`Attack`, 
            `PremierLeagueCards`.`Total` 
            FROM `PremierLeagueCards` 
            INNER JOIN `Positions` 
            ON `PremierLeagueCards`.`Position` = `Positions`.`id`"
        );

        $query->execute();

        $dbPlayers = $query->fetchAll();

        $Players = [];

        foreach ($dbPlayers as $dbPlayer) {
            $Players[] = new PlayerCard(
                $dbPlayer['id'],
                $dbPlayer['PlayerName'],
                $dbPlayer['Club'],
                $dbPlayer['PositionName'],
                $dbPlayer['Defence'],
                $dbPlayer['Control'],
                $dbPlayer['Attack'],
                $dbPlayer['Total']
            );
        }

        return $Players;
    }

    public function addNewCard(PlayerCard $newPlayer):bool {

        $query = $this->db->prepare("INSERT INTO 
    `PremierLeagueCards` (`PlayerName`, `Club`, `Position`, `Defence`, `Control`, `Attack`) 
    VALUES (:PlayerName, :Club, :Position, :Defence, :Control, :Attack)");

        return $query->execute([
            ':PlayerName' => $newPlayer->PlayerName,
            ':Club' => $newPlayer->Club,
            ':Position' => $newPlayer->PositionName,
            ':Control' => $newPlayer->Control,
            ':Attack' => $newPlayer->Attack,
            ':Defence'=> $newPlayer->Defence
        ]);
    }
}
