<html>
<head>
	<title>Once Human Timers</title>
	<meta http-equiv="refresh" content="60">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
	<script type="text/javascript">
		var timeUntilPhaseReset;
		var timeUntilWeeklyReset;
		var timeUntilVendorReset;
		var timeUntilDailyReset;
		var timeUntilLootReset;
		var timeUntilStairwayReset;
		var timeUntilPageReload = 59;
	</script>
	<?php
		// Variables
		$srvName = 'EU-PVE01-X0102';
		$prTime = '02/13/2025 07:00';
		$wrTime = 'next monday 06:00';
		$vrTime = 'next friday 23:00';
		$drTime = 'tomorrow 04:00';
		$ssTime = '07:00 first day of next month';
		
		// Variables
		$serverName = 'EU-PVE01-X0142'; // Server Name - Printed like this
		$serverStart = '03/28/2025 08:00'; // Server Start time in UTC+0 (Time shown ingame) (this was still winter time in EU)
		$serverType = 'Manibus'; // Manibus, Way of Winter or Evolutions Call
		$setTimezone = 'Europe/Berlin'; // Times will be converted to this Timezone

		// Arrays
		$stairwayArray = [1,8,15,22]; // Starting Days of the Stellar Stairway Phases
		$serverArray = []; // Starting Days of the Server Phases (Post Update 1.4)
		$serverArray['Manibus'] = [1,5,11,25,41];
		$serverArray['Way of Winter'] = [1,6,11,21,36];
		$serverArray['Evolutions Call'] = [1,7,12,19,29,39];

		// Fixed Times
		/* Times Known:
		- Commissions: Every 7 days from Server start, 07:00
		- Phase: Day X, 07:00
		- Vendor: Every 7 days from Server start, 23:00
		- Stellar: Day X, 07:00
		- Lootbox: every 4h, starting at 16:00 (according to community)
		- Daily: daily, should be at 16:00 according to community
		- Containers: ? before 5am CEST
		- Warband Donations: ?
		- Purification: ?
		- Hales' House: ?
		- Ancient One's Trial: ?
		- Day Reset: Every full Hour, 24h In Game = 1h Real
		*/
		$weeklyReset = '';
		$vendorReset = '';
		$dailyReset = '';
		$phaseReset = '';
		$stairwayReset = '';
		$lootboxReset = '';

		// Time Calculations
		$currentTime = new DateTimeImmutable('now', new DateTimeZone($setTimezone));

		$serverStartTime = new DateTimeImmutable($serverStart, new DateTimeZone("UTC"));
		$serverStartTime = $serverStartTime->setTimezone(new DateTimeZone($setTimezone));

		$serverStartDays = $currentTime->diff($serverStartTime)->format("%a"); // Calculate Days since Server Start

		for($i = 1; $i <= count($serverArray[$serverType]); $i++) {
			if($serverArray[$serverType][$i] <= $serverStartDays) {
				$serverPhase = $i; // If we land exactly on that server start day, or the Phase started earlier, we are in that Phase (or a higher phase, will be overwritten then)
			} else {
				$serverPhase = $i - 1; // If the next Phase has a higher start day count, we're still not in that Phase
				break;
			}
		};

		$stairwayStartTime = new DateTimeImmutable('06:00 first day of this month', new DateTimeZone("UTC"));
		$stairwayStartTime = $stairwayStartTime->setTimezone(new DateTimeZone($setTimezone));

		$stairwayStartDays = $currentTime->diff($stairwayStartTime)->format("%a"); // Calculate Days since Start of Month

		$stairwayResetTime = new DateTimeImmutable($ssTime, new DateTimeZone("UTC"));
		$stairwayResetTime = $stairwayResetTime->setTimezone(new DateTimeZone('Europe/Berlin'));

		$phaseResetTime = new DateTimeImmutable($prTime, new DateTimeZone("UTC"));
		$phaseResetTime = $phaseResetTime->setTimezone(new DateTimeZone('Europe/Berlin'));

		$weeklyResetTime = new DateTimeImmutable($wrTime, new DateTimeZone("UTC"));
		$weeklyResetTime = $weeklyResetTime->setTimezone(new DateTimeZone('Europe/Berlin'));

		$vendorResetTime = new DateTimeImmutable($vrTime, new DateTimeZone("UTC"));
		$vendorResetTime = $vendorResetTime->setTimezone(new DateTimeZone('Europe/Berlin'));

		$dailyResetTime = new DateTimeImmutable($drTime, new DateTimeZone("UTC"));
		$dailyResetTime = $dailyResetTime->setTimezone(new DateTimeZone('Europe/Berlin'));


		// calculate time unitl x reset
		$timeUntilStairwayReset = $stairwayResetTime->getTimestamp() - $currentTime->getTimestamp();
		echo '<script type="text/javascript">timeUntilStairwayReset = '.$timeUntilStairwayReset.';</script>';

		$timeUntilPhaseReset = $phaseResetTime->getTimestamp() - $currentTime->getTimestamp();
		echo '<script type="text/javascript">timeUntilPhaseReset = '.$timeUntilPhaseReset.';</script>';

		$timeUntilWeeklyReset = $weeklyResetTime->getTimestamp() - $currentTime->getTimestamp();
		echo '<script type="text/javascript">timeUntilWeeklyReset = '.$timeUntilWeeklyReset.';</script>';

		$timeUntilVendorReset = $vendorResetTime->getTimestamp() - $currentTime->getTimestamp();
		echo '<script type="text/javascript">timeUntilVendorReset = '.$timeUntilVendorReset.';</script>';

		$timeUntilDailyReset = $dailyResetTime->getTimestamp() - $currentTime->getTimestamp();
		echo '<script type="text/javascript">timeUntilDailyReset = '.$timeUntilDailyReset.';</script>';

		// now for the loot reset timer, we need the last daily reset, and add 4hours later
		$lootResetTime = $dailyResetTime->modify('-1 day');

		// if no longer in the future, increment lootreset time by 4 hours until we reach next daily reset
		while ($currentTime > $lootResetTime) {
			$lootResetTime = $lootResetTime->modify('+4 hours');
			if ($lootResetTime >= $dailyResetTime) break;
		}

		// calculate time until loot reset
		$timeUntilLootReset = $lootResetTime->getTimestamp() - $currentTime->getTimestamp();
		echo '<script type="text/javascript">timeUntilLootReset = '.$timeUntilLootReset.';</script>';
	?>
	<div class="box">
		<div class="title">Once Human Timers<br>(<?php echo $srvName; ?>)</div>
		<div class="card left">
			<div class="header">Stellar Stairway Reset</div>
			<div id="stairwayResetTimer" class="countdown"></div>
			<div class="footer">Next Reset: <?php echo $stairwayResetTime->format('l, d.m.Y H:i'); ?></div>
			<span class="tooltip"><b>Reset: Every 1st of the Month</b></br>Stellar Stairway reset. MOAR STARCHROM!</span>
		</div>
		<div class="card right">
			<div class="header">Phase Reset</div>
			<div id="phaseResetTimer" class="countdown"></div>
			<div class="footer">Next Reset: <?php echo $phaseResetTime->format('l, d.m.Y H:i'); ?></div>
			<span class="tooltip"><b>Reset: Depends on Server/Phase</b></br>Server progresses to next Phase.</span>
		</div>
		<div class="card left mid">
			<div class="header">Weekly Reset</div>
			<div id="weeklyResetTimer" class="countdown"></div>
			<div class="footer">Next Reset: <?php echo $weeklyResetTime->format('l, d.m.Y H:i'); ?></div>
			<span class="tooltip"><b>Reset: Monday 7am</b></br>- Purification</br>- Warband Donations</br>- Hales' moving House</br>- Ancient One's Trial</br>- maybe more.</span>
		</div>
		<div class="card right mid">
			<div class="header">Vendor Reset</div>
			<div id="vendorResetTimer" class="countdown"></div>
			<div class="footer">Next Reset: <?php echo $vendorResetTime->format('l, d.m.Y H:i'); ?></div>
			<span class="tooltip"><b>Reset: Saturday midnight</b></br>Resets Vendor money, so you can sell them stuff again.</span>
		</div>
		<div class="card left light">
			<div class="header">Daily Reset</div>
			<div id="dailyResetTimer" class="countdown"></div>
			<div class="footer">Next Reset: <?php echo $dailyResetTime->format('l, d.m.Y H:i'); ?></div>
			<span class="tooltip"><b>Reset: Each day 4am</b></br>I thought Securement Containers (Deviants), but they reset earlier... not sure</span>
		</div>
		<div class="card right light">
			<div class="header">Loot Box Reset</div>
			<div id="boxResetTimer" class="countdown"></div>
			<div class="footer">Next Reset: <?php echo $lootResetTime->format('l, d.m.Y H:i'); ?></div>
			<span class="tooltip"><b>Reset: Every 4 hours, starting at daily reset.</b></br>Resets loot in Strongholds, car trunks, etc.</span>
		</div>
		<div id="footer" class="footer">Times are in 'Europe/Berlin' Timezone<br><br>Page refreshes in seconds</div>
	</div>
	<script type="text/javascript" src="countdown.js"></script>
</body>
</html>