<?php 
	function guessBalls($match) {
		$pattern = "RGBY";
		$balls = '';
		for ($i = 0; $i < 4; $i++) {
			$balls .= $pattern[mt_rand(0,3)];
		}
		$hits = 0;
		$pseudohits = 0;
		echo 'In PC: '.$balls.PHP_EOL.'Input: '.$match.PHP_EOL;
		$mod = 0;
		for ($i = 0; $i < 4; $i++) {
			if ($balls[$i-$mod] == $match[$i-$mod]) {
				$balls = substr($balls, 0, $i-$mod).substr($balls, $i-$mod+1);
				$match = substr($match, 0, $i-$mod).substr($match, $i-$mod+1);
				$mod++;
				$hits++; 
			}
		}
		$mod = 0;
		for ($i = 0; $i < 4; $i++) {
			if (strlen($match) > $i-$mod && strpos($balls, $match[$i-$mod]) !== false) {
				$match = substr($match, 0, $i-$mod).substr($match, $i-$mod+1);
				$i++;
				$mod--;
				$pseudohits++; 
			}
		}
		echo 'Hits: '.$hits.PHP_EOL.'Pseudohits: '.$pseudohits;
	}
	
	guessBalls('BRRR');
