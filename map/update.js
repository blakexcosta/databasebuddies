    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/layers/FeatureLayer",
      "esri/Graphic",
      "esri/widgets/Expand",
      "esri/widgets/FeatureForm"
    ],
    function(
      Map, MapView, FeatureLayer, Graphic, Expand, FeatureForm
    ) {

      let editFeature, highlight, featureForm, editArea, attributeEditing, updateInstructionDiv;

      const featureLayer = new FeatureLayer({
        url: "https://services2.arcgis.com/RQcpPaCpMAXzUI5g/arcgis/rest/services/Beer_Database_Data/FeatureServer/0?token=cMHpRaDTg1dG6omlReZAajiMwSjkQaugvinrChzBLNxrC-5xjCalXj0LjOQEmnUn4gyMCsLQRNVFJiR6E-xnJTdhyOMSQZxmg06naKbKshU_0mLWfqBxWk0K5Ew1fTccOatDJqAwQQpwEJST97zlQlWv_ET4cK-bXXAjOJQ-sCCp3Nj5nu7BwltsACGuxAWST373TjEHSZsBEpFCpeSjisB_R9djspjbHitjAhcRkOaxBoq1jMN0KGFYX2GpVe9SpxImAOCYcnvI4P4CowNIfw..",
        outFields: ["*"],
        popupEnabled: false,
        id: "incidentsLayer"
      });

      const map = new Map({
        basemap: "streets-navigation-vector",
        layers: [featureLayer]
      });

      const view = new MapView({
        container: "viewDiv",
        map: map,
        center: [-117.18,34.06],
        zoom: 15
      });

      setupEditing();

      // ***********************************************************
      // Call FeatureLayer.applyEdits() with specified params.
      // ***********************************************************
      function applyEdits(params) {
        unselectFeature();
        featureLayer.applyEdits(params).then(function(editsResult) {
          // Get the objectId of the newly added feature.
          // Call selectFeature function to highlight the new feature.
          if (editsResult.addFeatureResults.length > 0) {
            const objectId = editsResult.addFeatureResults[0].objectId;
            selectFeature(objectId);
          }
        })
        .catch(function(error) {
          console.log("===============================================");
          console.error("[ applyEdits ] FAILURE: ", error.code, error.name,
            error.message);
          console.log("error = ", error);
        });
      }

      // *****************************************************
      // Check if a user clicked on an incident feature.
      // *****************************************************
      view.on("click", function(event) {
        // clear previous feature selection
        unselectFeature();

        view.hitTest(event).then(function(response) {
          // If a user clicks on an incident feature, select the feature.
          if (response.results[0].graphic && response.results[0].graphic.layer.id == "incidentsLayer") {
            selectFeature(response.results[0].graphic.attributes[featureLayer.objectIdField]);
          }
        });
      });

      // *****************************************************
      // Highlights the clicked incident feature and display
      // the feature form with the incident's attributes.
      // *****************************************************
      function selectFeature(objectId) {
        // query feature from the server
        featureLayer.queryFeatures({
          objectIds: [objectId],
          outFields: ["*"],
          returnGeometry: true
        }).then(function(results) {
          if (results.features.length > 0) {
            editFeature = results.features[0];

            // display the attributes of selected feature in the form
            featureForm.feature = editFeature;

            // highlight the feature on the view
            view.whenLayerView(editFeature.layer).then(function(layerView){
              highlight = layerView.highlight(editFeature);
            });

            attributeEditing.style.display = "block";
            updateInstructionDiv.style.display = "none";
          }
        });
      }

      // *****************************************************
      // Remove the feature highlight and remove attributes
      // from the feature form.
      // *****************************************************
      function unselectFeature() {
        attributeEditing.style.display = "none";
        updateInstructionDiv.style.display = "block";
        featureForm.feature = null;
        if (highlight){
          highlight.remove();
        }
      }

      // *****************************************************
      // Set up editing.
      // *****************************************************
      function setupEditing() {
        // input boxes for the attribute editing
        editArea = document.getElementById("editArea");
        updateInstructionDiv = document.getElementById("updateInstructionDiv");
        attributeEditing = document.getElementById("featureUpdateDiv");

        // Create a new feature form and set its layer to
        // 'incidents' featureLayer. Feature form displays
        // attributes of the fields specified in fieldConfig.
        featureForm = new FeatureForm({
          container: "formDiv",
          layer: featureLayer,
          fieldConfig: [
            {
              name: "IncidentType",
              options: {
                label: "Choose incident type"
              }
            },
            {
              name: "IncidentDescription",
              options: {
                label: "Describe the problem"
              }
            }
          ]
        });

        // Listen to the feature form's submit event.
        featureForm.on("submit", function(){
          if (editFeature) {
            // Grab updated attributes from the form.
            const updated = featureForm.getValues();

            // Loop through updated attributes and assign
            // the updated values to feature attributes.
            Object.keys(updated).forEach(function(name) {
              editFeature.attributes[name] = updated[name];
            });

            // Setup the applyEdits parameter with updates.
            const edits = {
              updateFeatures: [editFeature]
            };
            applyEdits(edits);
          }
        });

        // Expand widget for the editArea div.
        const editExpand = new Expand({
          expandIconClass: "esri-icon-edit",
          expandTooltip: "Expand Edit",
          expanded: true,
          view: view,
          content: editArea
        });

        view.ui.add(editExpand, "top-right");

        // *****************************************************
        // Update attributes of the selected feature.
        // *****************************************************
        document.getElementById("btnUpdate").onclick = function() {
          // Fires feature form's submit event.
          featureForm.submit();
        }

        // *****************************************************
        // Create a new feature at the click location.
        // *****************************************************
        document.getElementById("btnAddFeature").onclick = function () {
          unselectFeature();
          const handler = view.on("click", function(event) {
            handler.remove();
            event.stopPropagation();

            if (event.mapPoint) {
              point = event.mapPoint.clone();
              point.z = undefined;
              point.hasZ = false;

              // Create a new feature with incident type of "other".
              editFeature = new Graphic({
                geometry: point,
                attributes: {
                  "IncidentType": 7
                }
              });

              // Setup the applyEdits parameter with adds.
              const edits = {
                addFeatures: [editFeature]
              };
              applyEdits(edits);
              document.getElementById("viewDiv").style.cursor = "auto";
            } else {
              console.error("event.mapPoint is not defined");
            }
          });

          // Change the view's mouse cursor once user selects
          // a new incident type to create.
          document.getElementById("viewDiv").style.cursor = "crosshair";
          editArea.style.cursor = "auto";
        }

        // *****************************************************
        // Delete button click event. ApplyEdits is called
        // with the selected feature to be deleted.
        // *****************************************************
        document.getElementById("btnDelete").onclick = function() {
          // setup the applyEdits parameter with deletes.
          const edits = {
            deleteFeatures: [editFeature]
          };
          applyEdits(edits);
        }
      }
    });