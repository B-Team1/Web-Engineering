<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="form-group">
    <input type='hidden' name='renterID' id='renterID' value="<?php if (isset($_POST['renterID'])){ echo $_POST['renterID']; }elseif(isset($renterID)){ echo $renterID; }?>"/>
    <label for="name">Name: *</label>
    <input type="text" name="name" id="name" class="form-control"  value="<?php if (isset($_POST['name'])){ echo $_POST['name']; }elseif(isset($renterName)) { echo $renterName; } ?>" 
           required oninvalid="this.setCustomValidity('Geben Sie bitte den Namen ein!')" oninput="setCustomValidity('')" style="width:270px"/>
    <?php if (!empty($renterValidator->getNameError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getNameError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="vorname">Vorname: *</label>
    <input type="text" name="vorname" id="vorname" class="form-control"  value="<?php if (isset($_POST['vorname'])){ echo $_POST['vorname']; }elseif(isset($renterVorname)) { echo $renterVorname; } ?>" 
           required oninvalid="this.setCustomValidity('Geben Sie bitte den Vornamen ein!')" oninput="setCustomValidity('')" style="width:270px"/>
    <?php if (!empty($renterValidator->getVornameError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getVornameError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="phone">Telefon-Nr: *</label>
    <input type="text" name="phone" id="phone" value="<?php if (isset($_POST['phone'])){ echo $_POST['phone']; }elseif(isset($renterPhone)) { echo $renterPhone; } ?>" class="form-control"  required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre Telefonnummer ein')" 
            style="width:270px"  oninput="setCustomValidity('')" placeholder="079 111 11 11"/>
    <?php if (!empty($renterValidator->getPhoneError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getPhoneError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="street">Strasse: *</label>
    <input type="text" name="street" id="street" value="<?php if (isset($_POST['street'])){ echo $_POST['street']; }elseif(isset($renterStreet)) { echo $renterStreet; } ?>" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte die Strasse ein!')" 
            style="width:270px"  oninput="setCustomValidity('')"/>
    <?php if (!empty($renterValidator->getStreetError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getStreetError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="city">Ort: *</label>
    <input type="text" name="city" id="city" value="<?php if (isset($_POST['city'])){ echo $_POST['city']; }elseif(isset($renterCity)) { echo $renterCity; } ?>" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte den Ort ein!')"
           oninput="setCustomValidity('')" style="width:270px"/>
    <?php if (!empty($renterValidator->getCityError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getCityError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="plz">PLZ: *</label>
    <input type="text" name="plz" id="plz" value="<?php if (isset($_POST['plz'])){ echo $_POST['plz']; }elseif(isset($renterPLZ)) { echo $renterPLZ; } ?>" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte die PLZ ein!')" 
           oninput="setCustomValidity('')" style="width:270px"/>
    <?php if (!empty($renterValidator->getPlzError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getPlzError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="contractstart">Vertragsstart: *</label>
    <input type="date" name="contractstart" id="contractstart" value="<?php if (isset($_POST['contractstart'])){ echo $_POST['contractstart']; }elseif(isset($renterContractstart)) { echo $renterContractstart; } ?>" class="form-control" required oninvalid="this.setCustomValidity('Wählen Sie ein Datum aus!')" 
           oninput="setCustomValidity('')" style="width:270px"/>
    <?php if (!empty($renterValidator->getContractstartError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getContractstartError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="apartment">Wohnung: *</label>
    <select name="apartment" id="apartment" class="form-control" required oninvalid="this.setCustomValidity('Wählen Sie eine Wohnung aus!')" oninput="setCustomValidity('')" style="width: 270px" >
        <?php if (!empty($renterValidator->getApartmentError())): ?>
        <span class="help-inline"><?php echo $renterValidator->getApartmentError(); ?></span>
    <?php endif; ?>

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







                                            
