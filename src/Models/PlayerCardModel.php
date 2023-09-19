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

    public function getAllCards(int $DeleteStatus, string $PositionId = ''): array  //if a PositionId isnt provided its an empty string
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
        WHERE `PremierLeagueCards`.`Deleted` = :DeleteStatus" .
                ($PositionId ? " AND `Positions`.`id` = :PositionID" : "")      //if a position id is provided adds 'And positions.id clause to query
        );

        $PositionId ?
            $query->bindParam('DeleteStatus', $DeleteStatus) .          /* if a position id is provided bind both else but bind delete status */
            $query->bindParam('PositionID', $PositionId) :
            $query->bindParam('DeleteStatus', $DeleteStatus);

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

    public function changeActivationStatus(int $id, int $Deleted = 0): bool     //default value is 0 (not deleted)
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

        return $query->execute([                        //because the playercard is readonly regular binding doesnt work so it must be secured via the execute
            ':PlayerName' => $newPlayer->PlayerName,
            ':Club' => $newPlayer->Club,
            ':PositionName' => $newPlayer->PositionName,
            ':Control' => $newPlayer->Control,
            ':Attack' => $newPlayer->Attack,
            ':Defence' => $newPlayer->Defence,
            ':id' => $id
        ]);
    }

    public function getPositionData(): array
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

    public function SearchTool(int $DeleteStatus, string $order = '', string $search = '', string $PositionId = ''): array
    {
        $allowedColumns = ['PlayerName', 'Club', 'Defence', 'Control', 'Attack', 'Total', 'Deleted'];


        if ($order && in_array($order, $allowedColumns)) {          //because orderby isnt a param it cannot be binded, so to prevent sql injection we check
            $orderByClause = " ORDER BY `PremierLeagueCards`.`$order` DESC";        //if the proveded $order exists in the all columns variable add this 
        } else {
            $orderByClause = " ORDER BY `PremierLeagueCards`.`id`";                 //else order by id which is the default anyway
        }

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
        WHERE `PremierLeagueCards`.`Deleted` = :DeleteStatus" .
                ($PositionId ? " AND `Positions`.`id` = :positionId" : "") .
                ($search ? " AND (`PremierLeagueCards`.`PlayerName` LIKE :search OR `PremierLeagueCards`.`Club` LIKE :search)" : "") .
                $orderByClause
        );

        $query->bindParam('DeleteStatus', $DeleteStatus);

        if ($PositionId) {
            $query->bindParam(':positionId', $PositionId);
        }

        if ($search) {
            $searchStr = "%$search%";
            $query->bindParam(':search', $searchStr);
        }



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
}
