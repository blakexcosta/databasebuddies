require([
  "esri/Map",
  "esri/views/MapView",
  "esri/views/SceneView",
  "esri/layers/SceneLayer",
  "esri/renderers/SimpleRenderer",
  "esri/symbols/TextSymbol",
  "esri/layers/support/LabelClass",
  "esri/layers/FeatureLayer",
  "esri/widgets/Track",
  "esri/views/MapView"
], function(Map, MapView, SceneView, SceneLayer, LabelLayer, TextSymbol, LabelClass, FeatureLayer, Track) {
const map = new Map({
      basemap: "osm" //Additional basemap options are:  "satellite", "hybrid", "topo", "gray", "oceans", "osm", "national-geographic".
});
const view = new MapView({
      container: "viewDiv",
      map: map,
      zoom: 14,
      center: [-77.609481, 43.157694] // longitude, latitude
});
var sceneView;
let attributeEditing;

// Set a basic symbol on a layer to visualize all features the same way
var breweryMarker = {
  type: "simple",  // autocasts as new SimpleRenderer()
  symbol: {
    type: "simple-marker",  // autocasts as new SimpleMarkerSymbol()
    size: 15,
    style: "diamond",
    color: "green",
    outline: {  // autocasts as new SimpleLineSymbol()
      width: 0.5,
      color: "white"
    }
  }
};

var URL_root = "https://services2.arcgis.com/RQcpPaCpMAXzUI5g/arcgis/rest/services/Beer_Database_Data/FeatureServer/0?token=ut1VbLCnKq2KQnElb4NINDGtp_tECcNmxGj6_DapMRF3NS0UDPJd5d8BrOoEbaGsv_7O8bX63ya9XIPr09PQI2Jere_3Q9ionV7miz3GMS4jFiA0PzL5821lCAr9_Oq9g-cBb3hTLlv_o_s-hWm6aL9ZZeTN4lkLJkfYrfVqWWz6c8UooMaBjACjB3Bf6Bj-RyZDotFXk1EHy8RRyVG_Dbq0bObDd0tiuZSMpZMBIlYJZ7WawZhBIFQnyDvVEB6hBMATPaShjqS49u7taS1dUA..";
var layerURL = URL_root + 0;

var labelClass = {
  // Content
  labelExpressionInfo: {
    expression: "$feature.Name"
  },

  // Appearance
  symbol: {
    type: "text",
    color: "black",
    font: {
      family: "arial",
      style: "normal",
      weight: "bold",
      size: 10
    }
  },

  // Placement
  labelPlacement: "above-right",
};
var flayer = new FeatureLayer({
  url: layerURL,
  renderer: breweryMarker,
  labelingInfo: [labelClass]
});
map.layers.add(flayer);

var track = new Track({
  view: view
});
view.ui.add(track, "top-left");

// The sample will start tracking your location
// once the view becomes ready
view.when(function() {
  track.start();
});

});
