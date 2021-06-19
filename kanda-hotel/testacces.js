$(document).ready(function(){
if($('#acces').val() == "caisse"){
$('#paye').show();
}
if($('#acces').val() == "reception"){
$('#ch').show();
$('#cl').show();
}
if($('#acces').val() == "admin"){
$('#ch').show();
$('#paye').show();
$('#cl').show();
$('#para').show();
}
});