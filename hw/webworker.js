if(localStorage['time']=="undefined")
{
	var timer = 70;
}else{
	var timer = 70; 
	timer = parseInt(localStorage['time']);
}


function countDown()
{
 if(timer > 0){
 	postMessage(timer); 
 	timer--;
 	setTimeout("countDown()", 1000);
 }else{
 	postMessage("BlastOff");
 }



}

countDown();