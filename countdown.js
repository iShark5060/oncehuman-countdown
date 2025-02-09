// Variables set in index.php
// 		var timeUntilPhaseReset;
// 		var timeUntilWeeklyReset;
//		var timeUntilVendorReset;
// 		var timeUntilDailyReset;
// 		var timeUntilLootReset;
//		var timeUntilStairwayReset;
//		var timeUntilPageReload = 60;

var tickerStairway = setInterval("tickStairway()", 1000);
var tickerPhase = setInterval("tickPhase()", 1000);
var tickerWeekly = setInterval("tickWeekly()", 1000);
var tickerVendor = setInterval("tickVendor()", 1000);
var tickerDaily = setInterval("tickDaily()", 1000);
var tickerBox = setInterval("tickBox()", 1000);
var tickerCounter = setInterval("tickCounter()", 1000);

function tickStairway() {
	var secs = timeUntilStairwayReset;
	if (secs > 0) {
		timeUntilStairwayReset--; 
	} else {
		timeUntilStairwayReset = 2592000;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = ( (days < 10 ) ? "0" : "" ) + days + ":" + ( (hours < 10 ) ? "0" : "" ) + hours + ":" + ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;

	document.getElementById("stairwayResetTimer").innerHTML = pretty;
}

function tickPhase() {
	var secs = timeUntilPhaseReset;
	if (secs > 0) {
		timeUntilPhaseReset--; 
	} else {
		timeUntilPhaseReset = 604800;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = ( (days < 10 ) ? "0" : "" ) + days + ":" + ( (hours < 10 ) ? "0" : "" ) + hours + ":" + ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;

	document.getElementById("phaseResetTimer").innerHTML = pretty;
}

function tickWeekly() {
	var secs = timeUntilWeeklyReset;
	if (secs > 0) {
		timeUntilWeeklyReset--; 
	} else {
		timeUntilWeeklyReset = 604800;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = ( (days < 10 ) ? "0" : "" ) + days + ":" + ( (hours < 10 ) ? "0" : "" ) + hours + ":" + ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;

	document.getElementById("weeklyResetTimer").innerHTML = pretty;
}

function tickVendor() {
	var secs = timeUntilVendorReset;
	if (secs > 0) {
		timeUntilVendorReset--; 
	} else {
		timeUntilVendorReset = 604800;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = ( (days < 10 ) ? "0" : "" ) + days + ":" + ( (hours < 10 ) ? "0" : "" ) + hours + ":" + ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;

	document.getElementById("vendorResetTimer").innerHTML = pretty;
}

function tickDaily() {
	var secs = timeUntilDailyReset;
	if (secs > 0) {
		timeUntilDailyReset--; 
	} else {
		timeUntilDailyReset = 86400;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = ( (hours < 10 ) ? "0" : "" ) + hours + ":" + ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;

	document.getElementById("dailyResetTimer").innerHTML = pretty;
}

function tickBox() {
	var secs = timeUntilLootReset;
	if (secs > 0) {
		timeUntilLootReset--; 
	} else {
		timeUntilLootReset = 14400;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = ( (hours < 10 ) ? "0" : "" ) + hours + ":" + ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;

	document.getElementById("boxResetTimer").innerHTML = pretty;
}

function tickCounter() {
	var secs = timeUntilPageReload;
	if (secs > 0) {
		timeUntilPageReload--; 
	} else {
		timeUntilPageReload = 59;
	}

	var days= Math.floor(secs/86400); 
	secs %= 86400;
	var hours= Math.floor(secs/3600);
	secs %= 3600;
	var mins = Math.floor(secs/60);
	secs %= 60;
	var pretty = "Times are in 'Europe/Berlin' Timezone<br><br>Page refreshes in " + ( (secs < 10) ? "0" : "" ) + secs + " seconds.";

	document.getElementById("footer").innerHTML = pretty;
}