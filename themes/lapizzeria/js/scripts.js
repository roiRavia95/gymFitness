$ = jQuery.noConflict();

$(document).ready(() => {
  $(".mobile-menu a").on("click", (e) => {
    console.log("clicked");
    $("nav.site-nav").toggle("slow");
  });
  let breakpoint = 768;
  //Keep menu closed when loading
  if($(document).width()<=breakpoint){
    $("nav.site-nav").hide();
  };
  //Change menus incase of resizing
  $(window).resize((e) => {
    if ($(document).width() >= breakpoint) {
      $("nav.site-nav").show();
    } else {
      $("nav.site-nav").hide();
    }
  });
  $(function () {
    $(".gallery-image").fluidbox();
  });
});

function initMap() {

  let { latitude, longitude, zoom } = options;
  latitude = parseFloat(latitude);
  longitude = parseFloat(longitude);
  zoom = parseFloat(zoom);

  let laPizzeria = { lat: latitude, lng: longitude };
  let map = new google.maps.Map(document.getElementById("map"), {
    zoom: zoom,
    center: laPizzeria,
  });

  let contentString =
    '<h2 class="text-center">La Pizzeria</h2><h3 class="text-center"> Probably the Best pizza in the world</h3>';

  var infoWindow = new google.maps.InfoWindow({
    content: contentString,
  });

  let marker = new google.maps.Marker({
    position: laPizzeria,
    map: map,
    title: "La Pizzeria",
  });

  infoWindow.open(map, marker);
  marker.addListener("click", function () {
    if (!isInfoWindowOpen(infoWindow)) {
      infoWindow.open(map, marker);
    } else {
      infoWindow.close();
    }
  });
}
function isInfoWindowOpen(infoWindow) {
  var map = infoWindow.getMap();
  return map !== null && typeof map !== "undefined";
}
