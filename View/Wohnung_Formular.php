<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="form-group">
    <label for="name">Wohnungsname: *</label>
    <input type='hidden' name='wohnungID' id='wohnungID' value="<?php if (isset($_POST['wohnungID'])){ echo $_POST['wohnungID']; }else { echo $roomID; }?>"/>;
    <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($_POST['name'])){ echo $_POST['name']; }elseif(isset($roomName)) { echo $roomName; }?>"
        
           required oninvalid="this.setCustomValidity('Geben Sie bitte den Namen der Wohnung ein!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($roomValidator->getDescriptionError())): ?>
        <span class="help-inline"><?php echo $roomValidator->getDescriptionError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="expanse">Fläche [m^2]: *</label>
    <input type="number" name="expanse" id="expanse" class="form-control" value="<?php if (isset($_POST['expanse'])){ echo $_POST['expanse']; }else{ echo $roomExpanse;}?>"
           required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte die Fläche als Zahl ein!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($roomValidator->getAreaError())): ?>
        <span class="help-inline"><?php echo $roomValidator->getAreaError(); ?></span>
    <?php endif; ?>
</div>    
<div class="form-group">
    <label for="floor">Stockwerk: *</label>
    <input type="number" name="floor" id="floor" class="form-control" value="<?php if (isset($_POST['floor'])){ echo $_POST['floor'];}else{ echo $roomFloor;} ?>"
           required pattern="[0-9]" oninvalid="this.setCustomValidity('Geben Sie bitte das Stockwerk als Zahl ein!')" oninput="setCustomValidity('')" />
    <?php if (!empty($roomValidator->getFloorError())): ?>
        <span class="help-inline"><?php echo $roomValidator->getFloorError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="rent">Mietzins [Fr.]: *</label>
    <input type="number" name="rent" id="rent" class="form-control" value="<?php if (isset($_POST['rent'])){ echo $_POST['rent'];}else { echo $roomRent;} ?>"
           required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Mietzins pro Monat ein!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($roomValidator->getRentError())): ?>
        <span class="help-inline"><?php echo $roomValidator->getRentError(); ?></span>
    <?php endif; ?>
</div>