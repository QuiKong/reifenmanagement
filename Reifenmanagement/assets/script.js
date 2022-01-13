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
document.getElementById("defaultOpen").click();

