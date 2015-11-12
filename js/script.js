function doesExists(tofind, string){
  if(string.indexOf(tofind) > -1){
    return true;
  } else {
    return false;
  }
}

// Main pogramm loop
$(document).ready(function(){
  // Builds request url
  var url = "http://localhost/samenvattingen/get.php?";
  if(leerjaar){
    url += 'leerjaar' + "=" + leerjaar + "&";
  }
  if(vak){
    url += 'vak' + "=" + vak + "&";
  }
  if(hoofdstuk){
    url += 'hoofdstuk' + "=" + hoofdstuk + "&";
  }
  console.log(url);

  // Gets data from get.php?SUPPLIEDPARAMS
  $.get(url, function( data ) {
    if(data.length !== 0){
      var parsedData = JSON.parse(data);
      // Changes displayed list based on supplied parameters
      if(!leerjaar){
        // url: /
        var listData = "";
        $('#title').html('Kies een leerjaar');
        for(item in parsedData){
          if(!doesExists(parsedData[item].leerjaar, listData)){
            listData += "<li><a href=" + parsedData[item].leerjaar + ">" + parsedData[item].leerjaar + "<a/></li>";
          }
        }
      }
      if(leerjaar){
        // url: /5
        var listData = "";
        $('#title').html('Kies een vak');
        for(item in parsedData){
          if(!doesExists(parsedData[item].vak, listData)){
            var hrefurl = parsedData[item].leerjaar + "/" +  parsedData[item].vak;
            listData += "<li><a href="+ hrefurl +">" + parsedData[item].vak + "<a/></li>";
          }
        }
      }
      if(vak){
        // url: /5/Scheikunde
        var listData = "";
        $('#title').html('Kies een hoofdstuk');
        for(item in parsedData){
          if(!doesExists(parsedData[item].hoofdstuk, listData)){
            var hrefurl = parsedData[item].vak + "/H" + parsedData[item].hoofdstuk;
            listData += "<li><a href="+ hrefurl +">" + parsedData[item].hoofdstuk + "</a></li>";
          }
        }
      }
      if(hoofdstuk){
        // url: /5/Scheikunde/H5
        var listData = "";
        $('#title').html('Kies een samenvatting');
        for(item in parsedData){
          if(!doesExists(parsedData[item].titel, listData)){
            var hrefurl = "http://localhost/samenvattingen/summary/"+ parsedData[item].id +"/view";
            listData += "<li><a href="+ hrefurl +">" + parsedData[item].titel + "</a> door " + parsedData[item].auteur + "</li>";
          }
        }
      }

      // Passes listData string to #result <ul> in index.php
      $('#result').html(listData);
    } else {
      console.log("There weren't any results");
    }
  });;
});
