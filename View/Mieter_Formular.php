<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="form-group">
    <input type='hidden' name='renterID' id='renterID' value="<?php if (isset($_POST['renterID'])){ echo $_POST['renterID']; }elseif(isset($renterID)){ echo $renterID; }?>"/>
    <label for="name">Name: *</label>
    <input type="text" name="name" id="name" class="form-control"  value="<?php if (isset($_POST['name'])){ echo $_POST['name']; }elseif(isset($name)) { echo $name; } ?>" 
           style="width:270px"/>
</div>
<div class="form-group">
    <label for="vorname">Vorname: *</label>
    <input type="text" name="vorname" id="vorname" class="form-control"  value="<?php if (isset($_POST['vorname'])){ echo $_POST['vorname']; }elseif(isset($vorname)) { echo $vorname; } ?>" 
           style="width:270px"/>
</div>
<div class="form-group">
    <label for="phone">Telefon-Nr: *</label>
    <input type="text" name="phone" id="phone" pattern= "[0-9]" value="<?php if (isset($_POST['phone'])){ echo $_POST['phone']; }elseif(isset($phone)) { echo $phone; } ?>" class="form-control"  oninvalid="this.setCustomValidity('Geben Sie bitte Ihre Telefonnummer in folgendem Format ein: 079 123 12 12!')" 
            style="width:270px"  oninput="setCustomValidity('')" placeholder="079 111 11 11"/>
</div>
<div class="form-group">
    <label for="street">Strasse: *</label>
    <input type="text" name="street" id="street" value="<?php if (isset($_POST['street'])){ echo $_POST['street']; }elseif(isset($street)) { echo $street; } ?>" class="form-control" required oninvalid="this.setCustomValidity('Geben Sie bitte die Adresse ein!')" 
            style="width:270px"  oninput="setCustomValidity('')"/>
</div>
<div class="form-group">
    <label for="city">Ort: *</label>
    <input type="text" name="city" id="city" value="<?php if (isset($_POST['city'])){ echo $_POST['city']; }elseif(isset($city)) { echo $city; } ?>" class="form-control" style="width:270px"/>
</div>
<div class="form-group">
    <label for="plz">PLZ: *</label>
    <input type="text" name="plz" id="plz" value="<?php if (isset($_POST['plz'])){ echo $_POST['plz']; }elseif(isset($plz)) { echo $plz; } ?>" class="form-control" style="width:270px"/>
</div>
<div class="form-group">
    <label for="contractstart">Vertragsstart: *</label>
    <input type="date" name="contractstart" id="contractstart" value="<?php if (isset($_POST['contractstart'])){ echo $_POST['contractstart']; }elseif(isset($contractstart)) { echo $contractstart; } ?>" class="form-control" style="width:270px"/>
</div>







                                            
