function extract(variable) {
    for (var key in variable) {
        window[key] = variable[key];
    }
}
$.getJSON('https://freegeoip.net/json/?callback=?', geoip);
function geoip(data) {
  console.log(data);
  extract(data);
  switch(country_code) {
    case "CA":
      window.location = "https://google.ca";
    break;
    case "GB":
      window.location = "https://google.co.uk";
    break;
    case "AU":
      window.location = "https://google.com.au";
    break;
    case "DE":
      window.location = "https://google.de";
    break;
    case "FR":
      window.location = "https://google.fr";
    break;
    case "DK":
    window.location = "https://google.dk";
    break;
    case "NZ":
      window.location = "https://google.co.nz";
    break;
    case "PH":
      window.location = "https://google.com.ph";
    break;
    case "US":
      window.location = "https://google.us";
    break;
    default:
      window.location = "https://google.com";
    break;
  }
}
