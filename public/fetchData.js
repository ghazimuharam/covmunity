const confirmedCase = document.getElementById('confirmedCase');
const caseRecovered = document.getElementById('caseRecovered');
const deathsCase = document.getElementById('deathsCase');
const deathsRate = document.getElementById('deathsRate');
const coronaCase = [confirmedCase, caseRecovered, deathsCase, deathsRate];
const proxyurl = 'https://cors-anywhere.herokuapp.com/';
const url = 'https://ghzmhrm.dev/coronaCase.php';
var data;
var request = new XMLHttpRequest();
request.open('GET', proxyurl + url, true);
request.onload = function () {

// Begin accessing JSON data here
var data = JSON.parse(this.response);
    if (request.status == 200) {
        for (let index = 0; index < coronaCase.length; index++) {
            coronaCase[index].textContent = data[index];
            if(index == 3){
                var deathsRatediv = (parseFloat(data[2])/parseFloat(data[0]));
                coronaCase[index].textContent = Math.round(deathsRatediv*100)/1000 + '%';
            }
        }
    } else {
        for (let index = 0; index < coronaCase.length; index++) {
            coronaCase[index].textContent = "NaN";
        }
    }
}
request.send();
