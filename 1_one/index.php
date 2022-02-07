<?php

/*
  # EXERCISE ONE
*/

class LeagueTable
{
    public function __construct(array $players)
    {
        $this->standings = [];
        foreach($players as $index => $p) 
        {
            $this->standings[$p] = [
                'index'        => $index,
                'games_played' => 0,
                'score'        => 0
            ];
        }
    }

    public function recordResult(string $player, int $score) : void
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }

    public function playerRank(int $rank) : string
    {
        $ranks = $this->standings;
        uasort($ranks, function ($a, $b) {
            // sort by score
            if ($a['score'] != $b['score']) 
                return ($a['score'] > $b['score']) ? -1 : 1;
            // equal! sort by games played
            if ($a['games_played'] != $b['games_played'])
                return ($a['games_played'] < $b['games_played']) ? -1 : 1;
            // equal! sort by index
            return ($a['index'] < $b['index']) ? -1 : 1;
        });
        // - Your code here
        return array_keys($ranks)[$rank-1];
    }
}

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);

echo $table->playerRank(1);

/*
  All players have the same score. However, Arnold and Chris have played fewer games than Mike, and as Chris is before Arnold in the 
  list of players, he is ranked first. Therefore, the code above should display "Chris".
*/

?>