<?php
include "template.html";
include "Geometrie/geofunc.php";
?>
<body>
  <script type="text/javascript">

  $(document).ready(function(){

    $("select").change(function(){
      $.get("Geometrie/geo_script.php",  {
        do : this.id,
        val : $(this).val()
      },
      function(data){
        $('#'+data['div']).append(data['retstring']);
        $('#GeoGrafik').attr("src", data['img'])
      }, "json");
    });


    $('#ValSelectorDiv').on('click','.berechnen',function(){
      var mydata = [];
      $('.val_in').each(function(){
        mydata.push($(this).val());
      });
      $.get("Geometrie/geo_script.php", {
        do : $(this).val(),
        val : $('#TypSelector').val(),
        mydata : mydata
      },
      function(data){
        var test = data['wert'];
      }, "json");
    });

  });//ende document ready function
  </script>

  <div class="container text-center">
    <h1>Geometrie Längen- und Flächenberechnungen</h1>
    <br>
    <div class="">
      <div class="justify-content-center input-group" id="TypSelectorDiv">
        <div class="input-group-prepend ">
          <label class="input-group-text" for="TypSelector">Auswahl Form</label>
        </div>
        <select class="form-control" id="TypSelector">
          <?php
          echo SetOptionFieldArr($geolaengform);
          ?>
        </select>
      </div>
      <br>
      <div id="ValSelectorDiv" class=" ">
        <img alt="GeoGrafik_img" src="Geometrie/Bilder/auswahl.jpg" id="GeoGrafik">
      </div>
    </div>

    <br>
  </div>
</body>
