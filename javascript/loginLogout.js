    function login( x ){
      var a = document.createElement("a");
      var text = document.createTextNode("Hi! "+x+". Welcome back!");
      a.appendChild(text);
      a.href="./php/email/email.php";
      
      var par = document.getElementById("para");
      var st = document.getElementById("signin");
      par.replaceChild(a,st);
       
    }
    
        function logout(){
      var a = document.createElement("a");
      var text = document.createTextNode("|  Logout");
      a.appendChild(text);
      a.href="./php/Logout.php";
      
      var par = document.getElementById("para2");
      var st = document.getElementById("signup");
      par.replaceChild(a,st);
       
    }