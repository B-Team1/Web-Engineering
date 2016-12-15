<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="form-group">
    <input type='hidden' name='renterID' id='renterID' value="<?php if (isset($_POST['renterID'])){ echo $_POST['renterID']; }elseif(isset($renterID)){ echo $renterID; }?>"/>
    <label for="name">Name: *</label>
    <input type="text" name="name" id="name" class="form-control"  value="<?php if (isset($_POST['name'])){ echo $_POST['name']; }elseif(isset($renterName)) { echo $renterName; } ?>" 
           style="width:270px"/>
</div>
<div class="form-group">
    <label for="vorname">Vorname: *</label>
    <input type="text" name="vorname" id="vorname" class="form-control"  value="<?php if (isset($_POST['vorname'])){ echo $_POST['vorname']; }elseif(isset($renterVorname)) { echo $renterVorname; } ?>" 
           style="width:270px"/>
</div>
<div class="form-group">
    <label for="phone">Telefon-Nr: *</label>
    <input type="text" name="phone" id="phone" pattern= "[0-9]" value="<?php if (isset($_POST['phone'])){ echo $_POST['phone']; }elseif(isset($renterPhone)) { echo $renterPhone; } ?>" class="form-control"  oninvalid="this.setCustomValidity('Geben Sie bitte Ihre Telefonnummer in folgendem Format ein: 079 123 12 12!')" 
            style="width:270px"  oninput="setCustomValidity('')" placeholder="079 111 11 11"/>
</div>
<div class="form-group">
    <label for="street">Strasse: *</label>
    <input type="text" name="street" id="street" value="<?php if (isset($_POST['street'])){ echo $_POST['street']; }elseif(isset($renterStreet)) { echo $renterStreet; } ?>" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte die Adresse ein!')" 
            style="width:270px"  oninput="setCustomValidity('')"/>
</div>
<div class="form-group">
    <label for="city">Ort: *</label>
    <input type="text" name="city" id="city" value="<?php if (isset($_POST['city'])){ echo $_POST['city']; }elseif(isset($renterCity)) { echo $renterCity; } ?>" class="form-control" style="width:270px"/>
</div>
<div class="form-group">
    <label for="plz">PLZ: *</label>
    <input type="text" name="plz" id="plz" value="<?php if (isset($_POST['plz'])){ echo $_POST['plz']; }elseif(isset($renterPLZ)) { echo $renterPLZ; } ?>" class="form-control" style="width:270px"/>
</div>
<div class="form-group">
    <label for="contractstart">Vertragsstart: *</label>
    <input type="date" name="contractstart" id="contractstart" value="<?php if (isset($_POST['contractstart'])){ echo $_POST['contractstart']; }elseif(isset($renterContractstart)) { echo $renterContractstart; } ?>" class="form-control" style="width:270px"/>
</div>
<div class="form-group">
    <label for="apartment">Wohnung: *</label>
    <select name="apartment" id="apartment" class="form-control" style="width: 270px" >

        <?php
        if ($new==true){
        $sql= $roomc->selectFreeRooms();
        for ($i = 0; $i < count($sql); $i++) {
            $b = $sql[$i];
            
            if ($b[0] == $renterRoomID){
                $selected = "selected";
            }else{
                $selected = '';
            }
        echo '<option value="'.$b[0].'" '.$selected.'>'.$b[1].'</option>';
        }}elseif ($new==false){
            $sql= $roomc->selectFreeRooms();
            if (is_null($sql)){
                
            }else{
            for ($i = 0; $i < count($sql); $i++) {
            $b = $sql[$i];
            echo '<option value="'.$b[0].'" >'.$b[1].'</option>';
            }
            }
        echo '<option value="'.$renterRoomID.'" selected >'.$roomDescription.'</option>';    
        }
        ?>
    </select>                                
</div>







                                            
