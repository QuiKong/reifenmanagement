

function get_c() {
  var eingabe = document.exmplform.eingabe.value;
  var a = eingabe * 1;
  var b = eingabe * 2;
  var c = eingabe * a +b * 2;
  document.getElementById('ergebnis').innerHTML = c; 
  }

function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /* Make an HTTP request using the attribute value as the file name: */
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /* Remove the attribute, and call this function once more: */
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      /* Exit the function: */
      return;
    }
  }
}

function openHtab(evt, hTabName) {
  var i, h_tabcontent, tablinks;
  h_tabcontent = document.getElementsByClassName("h_tabcontent");
  for (i = 0; i < h_tabcontent.length; i++) {
    h_tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(hTabName).style.display = "block";
  evt.currentTarget.className += " active";
}

function opentab(evt, tabName) {
 var i, tabcontent, tablinks;
 tabcontent = document.getElementsByClassName("tabcontent");
 for (i = 0; i < tabcontent.length; i++) {
   tabcontent[i].style.display = "none";
 }
 tablinks = document.getElementsByClassName("tablinks");
 for (i = 0; i < tablinks.length; i++) {
   tablinks[i].className = tablinks[i].className.replace(" active", "");
 }
 document.getElementById(tabName).style.display = "block";
 evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();


/* startpunktangaben */

function startpunktangaben(){
  var coldtp1 = document.getElementById("coldtp1").value;
  var coldtpn1 = parseFloat(coldtp1);
  var coldtp2 = document.getElementById("coldtp2").value;
  var coldtpn2 = parseFloat(coldtp2);
  var coldtp3 = document.getElementById("coldtp3").value;
  var coldtpn3 = parseFloat(coldtp3);
  var coldtp4 = document.getElementById("coldtp4").value;
  var coldtpn4 = parseFloat(coldtp4);

  var airtemp = document.getElementById("airtemp").innerHTML;
  var airtempn = parseFloat(airtemp);
  var tracktemp = document.getElementById("tracktemp").innerHTML;
  var tracktempn = parseFloat(tracktemp);
  var tgemessen = document.getElementById("tgemessen").value ;
  //console.log(tgemessen);
var tgemessenn = parseFloat(tgemessen) ;
var t1 = tgemessenn + 273.15;
var t2 = coldtpn1 * t1;
var t3 = airtempn + 273.15;
var t4 = t2 / t3;


var t44 = tgemessenn - airtempn;
var t5 = airtempn + 293.15;

var t6 = t44/t5;

var t7 = 1.013 * t6;

var t8 = t4 + t7;


////////
var t1a = tgemessenn + 273.15;
var t2a = coldtpn2 * t1a;
var t3a = airtempn + 273.15;
var t4a = t2a / t3a;

var t44a = tgemessenn - airtempn;
var t5a = airtempn + 293.15;

var t6a = t44a/t5a;

var t7a = 1.013 * t6a;

var t8a = t4a + t7a;

/////

var t1b = tgemessenn + 273.15;
var t2b = coldtpn3 * t1b;
var t3b = airtempn + 273.15;
var t4b = t2b / t3b;


var t44b = tgemessenn - airtempn;
var t5b = airtempn + 293.15;

var t6b = t44b/t5b;

var t7b = 1.013 * t6b;

var t8b = t4b + t7b;

//////
var t1c = tgemessenn + 273.15;
var t2c = coldtpn4 * t1c;
var t3c = airtempn + 273.15;
var t4c = t2c / t3c;


var t44c = tgemessenn - airtempn;
var t5c = airtempn + 293.15;

var t6c = t44c/t5c;

var t7c = 1.013 * t6c;

var t8c = t4c + t7c;
    
    var ergebnis1 = document.getElementById("reifendruck1").innerHTML = t8.toFixed(3);
    var ergebnis2 = document.getElementById("reifendruck2").innerHTML = t8a.toFixed(3);
    var ergebnis3 = document.getElementById("reifendruck3").innerHTML = t8b.toFixed(3);
    var ergebnis4 = document.getElementById("reifendruck4").innerHTML = t8c.toFixed(3);
    reifendruckAngepasst();
    
}

function streckeanpassung(){
  var anpasskonstante = parseFloat(document.getElementById("anpasskonstante").value);
  var tstrecke = parseFloat(document.getElementById("tstrecke").value);
  var tstreckevorgabe = parseFloat(document.getElementById("tstreckevorgabe").value);

  var r1 = tstrecke - tstreckevorgabe;

  var r2 = anpasskonstante * r1;

  var ergebnis = document.getElementById("panpassungStecke").innerHTML = r2.toFixed(2);
}


function bleed(){
  var anpassungswert = parseFloat(document.getElementById("panpassungStecke").innerHTML);
  var heiztemperatur = parseFloat(document.getElementById("heiztemperatur").innerHTML);
  var airtemp = parseFloat(document.getElementById("airtemp").innerHTML) ;



  //bleed 1

  var ba1 = heiztemperatur + 273.15;
  var ba2 = anpassungswert * ba1;
  var ba3 = airtemp + 273.15;
  var ba4 = ba2 / ba3;

  var ba5 = heiztemperatur - airtemp;
  var ba6 = airtemp + 273.15;
  var ba7 = 1.013 * (ba5 / ba6);

  var ba8 = ba4 + ba7 ;
  var ergebnis1 = document.getElementById("bleed1").innerHTML = ba8.toFixed(3);

console.log('anpassungswert' +  anpassungswert);
console.log('heiztemperatur' +  heiztemperatur);
console.log('airtemp' +  airtemp);
   //bleed 2

  var bb1 = heiztemperatur + 273.15;
  var bb2 = anpassungswert * bb1;
  var bb3 = airtemp + 273.15;
  var bb4 = bb2 / bb3;

  var bb5 = heiztemperatur - airtemp;
  var bb6 = airtemp + 273.15;
  var bb7 = bb5 / bb6 * 1.013;

  var bb8 = bb4 + bb7 ;
  var ergebnis2 = document.getElementById("bleed2").innerHTML = bb8.toFixed(3);

     //bleed 3

  var bc1 = heiztemperatur + 273.15;
  var bc2 = anpassungswert * bc1;
  var bc3 = airtemp + 273.15;
  var bc4 = bc2 / bc3;

  var bc5 = heiztemperatur - airtemp;
  var bc6 = airtemp + 273.15;
  var bc7 = bc5 / bc6 * 1.013;

  var bc8 = bc4 + bc7 ;
  var ergebnis3 = document.getElementById("bleed3").innerHTML = bc8.toFixed(3);

     //bleed 4

  var bd1 = heiztemperatur + 273.15;
  var bd2 = anpassungswert * bd1;
  var bd3 = airtemp + 273.15;
  var bd4 = bd2 / bd3;

  var bd5 = heiztemperatur - airtemp;
  var bd6 = airtemp + 273.15;
  var bd7 = bd5 / bd6 * 1.013;

  var bd8 = bd4 + bd7 ;
  var ergebnis4 = document.getElementById("bleed4").innerHTML = bd8.toFixed(3);
}

function reifendruckAngepasst(){
  var reifendruck1 = parseFloat(document.getElementById("reifendruck1").innerHTML);
  var reifendruck2 = parseFloat(document.getElementById("reifendruck2").innerHTML);
  var reifendruck3 = parseFloat(document.getElementById("reifendruck3").innerHTML);
  var reifendruck4 = parseFloat(document.getElementById("reifendruck4").innerHTML);
   var airtemp = parseFloat(document.getElementById("airtemp").innerHTML);
   var tgemessen = parseFloat(document.getElementById("tgemessen").value) ;

//Reifendruck_angepasst 1

  var ba1 = tgemessen + 273.15;
  var ba2 = reifendruck1 * ba1;
  var ba3 = airtemp + 273.15;
  var ba4 = ba2 / ba3;

  var ba5 = tgemessen - airtemp;
  var ba6 = airtemp + 273.15;
  var ba7 = ba5 / ba6 * 1.013;

  var ba8 = ba4 + ba7 ;
  var ergebnis1 = document.getElementById("Reifendruck_angepasst1").innerHTML = ba8.toFixed(3);

   //Reifendruck_angepasst 2

  var bb1 = tgemessen + 273.15;
  var bb2 = reifendruck2 * bb1;
  var bb3 = airtemp + 273.15;
  var bb4 = bb2 / bb3;

  var bb5 = tgemessen - airtemp;
  var bb6 = airtemp + 273.15;
  var bb7 = bb5 / bb6 * 1.013;

  var bb8 = bb4 + bb7 ;
  var ergebnis2 = document.getElementById("Reifendruck_angepasst2").innerHTML = bb8.toFixed(3);

     //Reifendruck_angepasst 3

  var bc1 = tgemessen + 273.15;
  var bc2 = reifendruck3 * bc1;
  var bc3 = airtemp + 273.15;
  var bc4 = bc2 / bc3;

  var bc5 = tgemessen - airtemp;
  var bc6 = airtemp + 273.15;
  var bc7 = bc5 / bc6 * 1.013;

  var bc8 = bc4 + bc7 ;
  var ergebnis3 = document.getElementById("Reifendruck_angepasst3").innerHTML = bc8.toFixed(3);

     //Reifendruck_angepasst 4

  var bd1 = tgemessen + 273.15;
  var bd2 = reifendruck4 * bd1;
  var bd3 = airtemp + 273.15;
  var bd4 = bd2 / bd3;

  var bd5 = tgemessen - airtemp;
  var bd6 = airtemp + 273.15;
  var bd7 = bd5 / bd6 * 1.013;

  var bd8 = bd4 + bd7 ;
  var ergebnis4 = document.getElementById("Reifendruck_angepasst4").innerHTML = bd8.toFixed(3);
}

document.addEventListener('DOMContentLoaded', function(event) {
  var airtemp = document.getElementById("airtemp").innerHTML;
  var airtempn = parseFloat(airtemp);
  var tracktemp = document.getElementById("tracktemp").innerHTML;
  var tracktempn = parseFloat(tracktemp);
  var tgemessen = airtempn + tracktempn ;

  var tgemessenn = document.getElementById("tgemessen").innerHTML = tgemessen;

  $("#addBtn").on('click', function () {
        var lastid = $(".ele-tr:last").attr("id");
        var split_id = lastid.split("_");
        var nextindex = Number(split_id[1]) + 1;

          $(".ele-tr:last").after("<tr class='ele-tr' id='tr_"+nextindex+"'></tr>");
      $("#tr_" + nextindex).append(`<td>
    <select id="Reifenplatz" name="Reifenplatz">
        <option value="Vorne_Links">Vorne Links</option>
        <option value="Vorne_Rechts">Vorne Rechts</option>
        <option value="Hinten_Links">Hinten Links</option>
        <option value="Hinten_Rechts">Hinten Rechts</option>
    </select>
</td>

<td>
    <select id="Reifenart" name="Reifenart">
        <option value="Slicks">Slicks</option>
        <option value="Inters">Inters</option>
        <option value="Rain">Rain</option>
    </select>
</td>

<td>
    <select id="Mischung" name="Mischung">
        <option value="Slicks_1"> Cold(H/E) </option>
        <option value="Slicks_2"> Medium(G/D)</option>
        <option value="Slicks_3"> Hot(I/F)</option>
        <option value="Inters_1"> Intermediate(H+/E+)</option>
        <option value="Rain_1"> Dry wet</option>
        <option value="Rain_2"> Heavy wet</option>
    </select>
</td>

<td>
    <select id="Bezeichnung" name="Bezeichnung">
        <option value="1xx">1xx</option>
        <option value="2xx">2xx</option>
        <option value="3xx">3xx</option>
        <option value="4xx">4xx</option>
        <option value="5xx">5xx</option>
        <option value="7xx">7xx</option>
    </select>
</td>

<td>
    <select id="Bearbeitungsvarianten" name="Bearbeitungsvarianten">
        <option value="text"></option>
        <option value="Keine">Keine</option>
        <option value="Siped">Siped</option>
        <option value="Extra_grooved">Extra grooved</option>
        <option value="Extra_grooved_siped">Extra grooved and siped</option>
    </select>
</td>

<td><input type="number"></td>
<td>
    <span class="addBtn removeme" id="remove_`+ nextindex +`">-</span>
</td>`);

});

$('.table').on('click','.removeme',function(){
                
        var id = this.id;
        var split_id = id.split("_");
        var deleteindex = split_id[1];

        $("#tr_" + deleteindex).remove();
    });
})

