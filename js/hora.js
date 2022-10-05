function show5() {
    if (!document.layers && !document.all && !document.getElementById) { return false;}
    var Digital = new Date();
    var hours = Digital.getHours();
    var minutes = Digital.getMinutes();
    var seconds = Digital.getSeconds();

    var dn = "PM"
    if (hours < 12){
        dn = "AM";
	}
    if (hours > 12){
        hours = hours - 12;
	}
    if (hours == 0){
        hours = 12;
	}

    if (minutes <= 9){
        minutes = "0" + minutes;
	}
    if (seconds <= 9){
        seconds = "0" + seconds;
	}

    myclock = "<font size='2' face='Arial' ><b><font size='1'></font>" + hours + ":" + minutes + ":" + seconds + " " + dn + "</b></font>";
    if(document.layers){
        document.layers.liveclock.document.write(myclock);
        document.layers.liveclock.document.close();
    }else if(document.all)
        liveclock.innerHTML = myclock;
    else if(document.getElementById){
        document.getElementById("liveclock").innerHTML = myclock;
	}
    setTimeout("show5()", 1000);
}
window.onload = show5;

//formato 24 horas
function show10() {
    if (!document.layers && !document.all && !document.getElementById) { return false;}
    var Digital1 = new Date();
    var hours1 = Digital1.getHours();
    var minutes1 = Digital1.getMinutes();
    var seconds1 = Digital1.getSeconds();
  /*var dn = "PM"
    if (hours < 12){
        dn = "AM";
    }
    if (hours > 12){
        hours = hours - 12;
    }
    if (hours == 0){
        hours = 12;
    }*/
    if (minutes1 <= 9){
        minutes1 = "0" + minutes1;
    }
    if (seconds1 <= 9){
        seconds1 = "0" + seconds1;
    }

    myclock1 = "<font size='5'><b>" + hours1 + ":" + minutes1 + ":" + seconds1 + " </b></font>";
    if(document.layers){
        document.layers.liveclock1.document.write(myclock1);
        document.layers.liveclock1.document.close();
    }else if(document.all)
        liveclock1.innerHTML = myclock1;
    else if(document.getElementById){
        document.getElementById("liveclock1").innerHTML = myclock1;
    }
    setTimeout("show10()", 1000);
}
//window.onload = show5show10;