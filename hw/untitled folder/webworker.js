var timer = 60;

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