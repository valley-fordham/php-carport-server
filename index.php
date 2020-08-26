<?php
function triggerDoor() {
    exec('gpio write 7 0');
    sleepFor(1);
    exec('gpio write 7 1');
}
function getDoorStatus() {
    exec('gpio read 0', $output);
    return (int)$output[0];
}
function sleepFor($secondsToSleep) {
    usleep($secondsToSleep * 1000000);
}
// Recursively attempts to close door, maximum of 3 attempts
function closeDoor($attempts) {
    if ($attempts <= 3 && getDoorStatus() == 0) {
        triggerDoor();
        sleepFor(25);
        closeDoor(++$attempts);
    }
}


// Web service handling
if(isset($_GET['trigger'])) {
    triggerDoor();
}
if(isset($_GET['status'])) {
    echo(getDoorStatus());
    exit(0);
}
if(isset($_GET['close_carport'])) {
    closeDoor(1);
}
if (isset($_GET['open_carport'])) {
    if (getDoorStatus() == 1) {
        triggerDoor();
    } else {
        echo('2');
        exit(-1);
    }
}
?>

<html lang="en-AU">
<head>
    <title>Simple PHP Carport Door Controller</title>
</head>
<body>
<div class='body-text'>
    Nothing to see here folks.
</div>
</body>
</html>