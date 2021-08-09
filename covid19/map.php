  <script type="text/javascript">
  /* Note: This code requires that you consent to location sharing when
    prompted by your browser. If you see the error "Geolocation permission
    denied.", it means you probably did not give permission for the browser to locate you. */
  let pos;
  let map;
  let bounds;
  let infoWindow;
  let currentInfoWindow;
  let service;
  let infoPane;
  function initMap() {
    // Initialize variables
    bounds = new google.maps.LatLngBounds();
    infoWindow = new google.maps.InfoWindow;
    currentInfoWindow = infoWindow;

    infoPane = document.getElementById('panel');

    // Try HTML5 geolocation
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(position => {
        pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        map = new google.maps.Map(document.getElementById('vacc_centres_map'), {
          mapId: "ec9129a41ca430bd",
          center: pos,
          zoom: 12
        });
        bounds.extend(pos);

        infoWindow.setPosition(pos);
        infoWindow.setContent('Location found.');
        infoWindow.open(map);
        map.setCenter(pos);
        // Call Places Nearby Search on the default location
        getNearbyPlaces(pos);
      }, () => {
        // Browser supports geolocation, but user has denied permission
        handleLocationError(true, infoWindow);
      });
    } else {
      // Browser doesn't support geolocation
      handleLocationError(false, infoWindow);
    }
  }

  // Handle a geolocation error
  function handleLocationError(browserHasGeolocation, infoWindow) {
    // Set default location to Windsor, Ontario
    pos = { lat: 42.314, lng: -83.0364 };
    map = new google.maps.Map(document.getElementById('vacc_centres_map'), {
      mapId: "ec9129a41ca430bd",
      center: pos,
      zoom: 12
    });

    // Display an InfoWindow at the map center
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Geolocation permissions denied. Using default location.' :
      'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
    currentInfoWindow = infoWindow;
    // Call Places Nearby Search on the default location
    getNearbyPlaces(pos);

  }
  // Perform a Places Nearby Search Request
  function getNearbyPlaces(position) {
    let request = {
      location: position,
      radius: '5000',
      keyword: 'covid-19 vaccination centre near me'
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, nearbyCallback);
  }
  function nearbyCallback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      createMarkers(results);
    }
  }

  // Set markers at the location of each place result
  function createMarkers(places) {
    places.forEach(place => {
      let marker = new google.maps.Marker({
        position: place.geometry.location,
        map: map,
        title: place.name
      });


      // Add click listener to each marker
      google.maps.event.addListener(marker, 'click', () => {
        let request = {
          placeId: place.place_id,
          fields: ['name', 'formatted_address', 'geometry', 'rating',
            'website', 'photos']
        };


        service.getDetails(request, (placeResult, status) => {
          showDetails(placeResult, marker, status)
        });
      });

      // Adjust the map bounds to include the location of this marker
      bounds.extend(place.geometry.location);
    });

    map.fitBounds(bounds);
  }


  // Builds an InfoWindow to display details above the marker
  function showDetails(placeResult, marker, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      let placeInfowindow = new google.maps.InfoWindow();
      let rating = "None";
      if (placeResult.rating) rating = placeResult.rating;
      placeInfowindow.setContent('<div><strong>' + placeResult.name +
        '</strong><br>' + 'Rating: ' + rating + '</div>');
      placeInfowindow.open(marker.map, marker);
      currentInfoWindow.close();
      currentInfoWindow = placeInfowindow;
      showPanel(placeResult);
    } else {
      console.log('showDetails failed: ' + status);
    }
  }


  // Displays place details in a sidebar
  function showPanel(placeResult) {
    // If infoPane is already open, close it
    if (infoPane.classList.contains("open")) {
      infoPane.classList.remove("open");
    }

    // Clear the previous details
    while (infoPane.lastChild) {
      infoPane.removeChild(infoPane.lastChild);
    }


    // Add the primary photo, if there is one
    if (placeResult.photos) {
      let firstPhoto = placeResult.photos[0];
      let photo = document.createElement('img');
      photo.style.width="25%";
      photo.classList.add('hero');
      photo.src = firstPhoto.getUrl();
      infoPane.appendChild(photo);
    }

    // Add place details with text formatting
    let name = document.createElement('h3');
    name.classList.add('place');
    name.textContent = placeResult.name;
    infoPane.appendChild(name);
    if (placeResult.rating) {
      let rating = document.createElement('p');
      rating.classList.add('details');
      rating.textContent = `Rating: ${placeResult.rating} \u272e`;
      infoPane.appendChild(rating);
    }
    let address = document.createElement('p');
    address.classList.add('details');
    address.textContent = placeResult.formatted_address;
    infoPane.appendChild(address);
    if (placeResult.website) {
      let websitePara = document.createElement('p');
      let websiteLink = document.createElement('a');
      let websiteUrl = document.createTextNode(placeResult.website);
      websiteLink.appendChild(websiteUrl);
      websiteLink.title = placeResult.website;
      websiteLink.href = placeResult.website;
      websitePara.appendChild(websiteLink);
      infoPane.appendChild(websitePara);
    }

    // Open the infoPane
    infoPane.classList.add("open");
  }
  </script>


  <div style="margin-top:30px">
    <h2>Nearest Vaccination Centre</h2>
    <hr>
    <p>Please make sure your location is turned on. The map will show the nearest vaccination centres near you. (within 5km)</p>

    <div id="vacc_centres_map" style="height:50%"></div>
    <br>
    <div id="panel">
    </div>


  </div>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIxhd84Uoeixq5nMFFYFhiAwvUYmqTX30&callback=initMap&libraries=places" async></script>
