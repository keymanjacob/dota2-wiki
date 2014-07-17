var timer = 30;

function countDown()
{
setTimeout("countDown()", 1000);
postMessage("time");


}

countDown();