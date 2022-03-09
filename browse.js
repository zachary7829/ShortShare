let jsondata = {};
let xhr = new XMLHttpRequest();
xhr.open('GET',"shortcuts/data.json",false);
xhr.send();
if ((xhr.responseText).includes('Shortcut Name')){
jsondata = JSON.parse(xhr.responseText);
  document.getElementById("shortcut-name-display").innerHTML = jsondata['Shortcut Name'];
  document.getElementById("shortcut-version-display").innerHTML = jsondata['Shortcut Version'];
  document.getElementById("shortcut-icloudlink-display").innerHTML = jsondata['Shortcut iCloud Link'];
} else {
  document.getElementById("shortcut-name-display").innerHTML = 'No Shortcut Names Found';
  document.getElementById("shortcut-version-display").innerHTML = 'No Shortcut Versions Found';
  document.getElementById("shortcut-icloudlink-display").innerHTML = 'No Shortcut iCloud Links Found';
}