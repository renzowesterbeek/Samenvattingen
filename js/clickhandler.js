function getNonrelativeUrl(path){
  var hostname = "";
  // Fix for local directory
  if(window.location.hostname == "localhost"){
    hostname = window.location.hostname + "/samenvattingen";
  }
  return "http://" + hostname + "/" + path;
}

$(document).ready(function(){
  $('button').click(function(){
    document.location.href = getNonrelativeUrl($(this).val());
  });

  // Corrects brand link to non-relative page
  $('#brand').attr('href', getNonrelativeUrl($('#brand').attr('href')));
});
