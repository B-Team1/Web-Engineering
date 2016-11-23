<div class="form-group">
    <label for="name">Wohnungsname: *</label>
    <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"
           required oninvalid="this.setCustomValidity('Geben Sie bitte den Namen der Wohnung ein!')" oninput="setCustomValidity('')"/>
    <span class="error"><?php echo $nameErr;?></span>
</div>
<div class="form-group">
    <label for="expanse">Fläche [m^2]: *</label>
    <input type="number" name="expanse" id="expanse" class="form-control" value="<?php if (isset($_POST['expanse'])) echo $_POST['expanse']; ?>"
           required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte die Fläche als Zahl ein!')" oninput="setCustomValidity('')"/>
    <span class="error"><?php echo $expanseErr;?></span>
</div>    
<div class="form-group">
    <label for="floor">Stockwerk: *</label>
    <input type="number" name="floor" id="floor" class="form-control" value="<?php if (isset($_POST['floor'])) echo $_POST['floor']; ?>"
           required pattern="[0-9]" oninvalid="this.setCustomValidity('Geben Sie bitte das Stockwerk als Zahl ein!')" oninput="setCustomValidity('')" />
    <span class="error"><?php echo $floorErr;?></span>
</div>
<div class="form-group">
    <label for="rent">Mietzins [Fr.]: *</label>
    <input type="number" name="rent" id="rent" class="form-control" value="<?php if (isset($_POST['rent'])) echo $_POST['rent']; ?>"
           required pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Mietzins pro Monat ein!')" oninput="setCustomValidity('')"/>
    <span class="error"><?php echo $rentErr;?></span>
</div>