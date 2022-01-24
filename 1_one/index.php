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
        // - Your code here
        return '';
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