<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Checklist</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
  <div class="Rtable Rtable--5cols Rtable--collapse">
    <div class="Rtable-row Rtable-row--head">
      <div class="Rtable-cell date-cell column-heading">S.No.</div>
      <div class="Rtable-cell topic-cell column-heading">Name</div>
      <div class="Rtable-cell topic-cell column-heading">Mobile No.</div>
      <div class="Rtable-cell access-link-cell column-heading">Momento</div>
      <div class="Rtable-cell replay-link-cell column-heading">Reg-Kit</div>
      <div class="Rtable-cell pdf-cell column-heading">Room Allotment</div>
    </div> 

    <?php include './connection.php' ?>
    <?php

      $sql = "SELECT * FROM checklist";
      $result = mysqli_query($conn, $sql);

      $sno = 1;
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          if($sno%2 == 1) $strip = "";
          else $strip = "is-striped";
          if($row['Momento'] == 1) $momento = 'checked';
          else $momento = "";
          if($row['Room'] == 1) $room = 'checked';
          else $room = "";
          if($row['Regkit'] == 1) $regkit = 'checked';
          else $regkit = "";
          echo ('<div class="Rtable-row '.$strip.'">
                  <div class="Rtable-cell date-cell">
                    <div class="Rtable-cell--heading">Date</div>
                    <div class="Rtable-cell--content date-content"><span class="webinar-date">'.$sno.'</div>
                  </div>
                  <div class="Rtable-cell topic-cell">
                    <div class="Rtable-cell--content title-content">'.$row["Name"].'</div>
                  </div>
                  <div class="Rtable-cell topic-cell">
                    <div class="Rtable-cell--content title-content">'.$row["Mobile"].'</div>
                  </div>
                  <div class="Rtable-cell access-link-cell">
                    <div class="Rtable-cell--heading">Momento</div>
                    <div class="Rtable-cell--content access-link-content"><input class="Momento" onchange="update_list(this)" type="checkbox"'.$momento.'></div>
                  </div>
                  <div class="Rtable-cell replay-link-cell">
                    <div class="Rtable-cell--heading">Replay</div>
                    <div class="Rtable-cell--content replay-link-content"><input class="Regkit" onchange="update_list(this)" type="checkbox"'.$regkit.'></div>
                  </div>
                  <div class="Rtable-cell Rtable-cell--foot pdf-cell">
                    <div class="Rtable-cell--heading">Checklist</div>
                    <div class="Rtable-cell--content pdf-content"><input class="Room" onchange="update_list(this)" type="checkbox"'.$room.'></div>
                  </div>
                </div>');
        $sno++;
        }
      }

    ?>
  </div>
</div>

<script>
  function update_list(event){
    var table  = event.parentElement.parentElement.parentElement;
    var child = table.children;
    var name = child[1].children[0].innerHTML;
    var mobile = child[2].children[0].innerHTML;
    var momento = child[3].children[1].children[0];
    var Regkit = child[4].children[1].children[0];
    var room = child[5].children[1].children[0];
    console.log(Regkit,room);
    var xhr = new XMLHttpRequest();
    let momento_check = 0,regkit_check=0,room_check =0;
    if(momento.checked == true) momento_check = 1;
    if(Regkit.checked == true) regkit_check = 1;
    if(room.checked == true) room_check = 1;

    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log('done');
      }
    };

    console.log(
    "Utility/Update_checklist.php?Mobile=".concat(mobile).concat('&').concat('Momento=').concat(momento_check).concat('&').concat('Regkit=').concat(regkit_check).concat('&').concat('Room=').concat(room_check) 
    );

    url = "Utility/Update_checklist.php?Mobile=".concat(mobile).concat('&').concat('Momento=').concat(momento_check).concat('&').concat('Regkit=').concat(regkit_check).concat('&').concat('Room=').concat(room_check) ;

    xhr.open("GET",url);
    xhr.send();

  }

</script>
  
</body>
</html>
