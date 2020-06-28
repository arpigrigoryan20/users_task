
var  countries_select=document.getElementById('country');

for(var i=0;i<countries.length;i++){
    var option=document.createElement('option');
    option.setAttribute('value',countries[i]);
    option.text=countries[i];
    countries_select.append(option)
}

