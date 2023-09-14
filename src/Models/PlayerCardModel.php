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
        `PremierLeagueCards`.`Total`,
        `PremierLeagueCards`.`Deleted` 
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
            $dbPlayer['Total'],
            $dbPlayer['Deleted']
        );

        return $Player;
    }

    public function getAllCards(int $DeleteStatus, string $PositionId = ''): array
    {
        $query = $this->db->prepare(
            "SELECT `PremierLeagueCards`.`id`, 
        `PremierLeagueCards`.`PlayerName`, 
        `PremierLeagueCards`.`Club`, 
        `Positions`.`PositionName`, 
        `PremierLeagueCards`.`Defence`, 
        `PremierLeagueCards`.`Control`, 
        `PremierLeagueCards`.`Attack`, 
        `PremierLeagueCards`.`Total`,
        `PremierLeagueCards`.`Deleted` 
        FROM `PremierLeagueCards` 
        INNER JOIN `Positions` 
        ON `PremierLeagueCards`.`Position` = `Positions`.`id`
        WHERE `PremierLeagueCards`.`Deleted` = $DeleteStatus" .
                ($PositionId ? " AND `Positions`.`id` = $PositionId" : "")
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
                $dbPlayer['Total'],
                $dbPlayer['Deleted']
            );
        }

        return $Players;
    }


    public function addNewCard(PlayerCard $newPlayer): bool
    {

        $query = $this->db->prepare("INSERT INTO 
    `PremierLeagueCards` (`PlayerName`, `Club`, `Position`, `Defence`, `Control`, `Attack`) 
    VALUES (:PlayerName, :Club, :Position, :Defence, :Control, :Attack)");

        return $query->execute([
            ':PlayerName' => $newPlayer->PlayerName,
            ':Club' => $newPlayer->Club,
            ':Position' => $newPlayer->PositionName,
            ':Control' => $newPlayer->Control,
            ':Attack' => $newPlayer->Attack,
            ':Defence' => $newPlayer->Defence
        ]);
    }

    public function changeActivationStatus(int $id, int $Deleted = 0): bool
    {
        $query = $this->db->prepare("UPDATE `PremierLeagueCards`
        SET `Deleted` = :Deleted
        WHERE `id` = :id
        LIMIT 1;");
        return $query->execute([
            ':Deleted' => $Deleted,
            ':id' => $id
        ]);
    }

    public function updatePlayer(PlayerCard $newPlayer, int $id): bool
    {
        $query = $this->db->prepare("UPDATE `PremierLeagueCards`
        SET `PlayerName` = :PlayerName, 
        `Club` = :Club, 
        `Position` = :PositionName, 
        `Defence` = :Defence, 
        `Control` = :Control, 
        `Attack` = :Attack
        WHERE `id` = :id");

        return $query->execute([
            ':PlayerName' => $newPlayer->PlayerName,
            ':Club' => $newPlayer->Club,
            ':PositionName' => $newPlayer->PositionName,
            ':Control' => $newPlayer->Control,
            ':Attack' => $newPlayer->Attack,
            ':Defence' => $newPlayer->Defence,
            ':id' => $id
        ]);
    }

    public function getPositionData()
    {
        $query = $this->db->prepare(
            "SELECT `Positions`.`id`,
        `Positions`.`PositionName`
        FROM `Positions`"
        );

        $query->execute();

        $dbPositions = $query->fetchAll();

        return $dbPositions;
    }
}
