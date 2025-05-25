<?php
require_once '../includes/db.php';

$stmt = $pdo->prepare("
    SELECT p.username, p.display_name, 
           COALESCE(SUM(s.points), 0) AS total_points
    FROM participants p
    LEFT JOIN scores s ON p.id = s.participant_id
    GROUP BY p.id
    ORDER BY total_points DESC
");
$stmt->execute();
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($participants as $i => $participant):
    $rowClass = '';
    if ($i === 0) $rowClass = 'table-success';
    elseif ($i === 1) $rowClass = 'table-success';
    elseif ($i === 2) $rowClass = 'table-success';
    ?>
    <tr class="<?= $rowClass ?>" style="<?php
        if ($i === 0) echo 'background-color: #14532d';
        elseif ($i === 1) echo 'background-color: #22c55e;';
        elseif ($i === 2) echo 'background-color: #bbf7d0';
    ?>">
        <td><?= htmlspecialchars($participant['display_name']) ?></td>
        <td><?= (int)$participant['total_points'] ?></td>
    </tr>
<?php endforeach; ?>