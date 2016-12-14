<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="form-group">
    <input type='hidden' name='billID' id='billID' value="<?php if (isset($_POST['billID'])){ echo $_POST['billID']; }else{ echo $billID; }?>"/>
    <input type='hidden' name='costType' id='costType' value="<?php if (isset($_POST['costType'])){ echo $_POST['costType']; }else { echo $costType; }?>"/>
    <label for="invoicedate">Rechnungsdatum (tt.mm.jjjj): *</label>
    <input type="date" name="invoicedate" id="invoicedate" class="form-control" pattern="\d{1,2}.\d{1,2}.\d{4}" value="<?php if (isset($_POST['invoicedate'])){ echo $_POST['invoicedate']; }else { echo $invoiceDate; } ?>" 
           style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Rechnungsdatum aus!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($billValidator->getDateError())): ?>
        <span class="help-inline"><?php echo $billValidator->getDateError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="apartment">Wohnung: *</label>
    <select name="apartment" id="apartment" class="form-control" style="width: 270px" >

        <?php
        $sql = $rc->selectRoomsByHirer();

        for ($i = 0; $i < count($sql); $i++) {
            $b = $sql[$i];
            if ($b[0] == $wohnungID){
                $selected = "selected";
            }else{
                $selected = '';
            }
        echo '<option value="'.$b[0].'" '.$selected.'>'.$b[1].'</option>';
        }
        ?>
    </select>                                
</div>
<div class="form-group">
    <label for="description">Beschreibung:</label>
    <input type="text" name="description" id="description" class="form-control" value="<?php if (isset($_POST['description'])){ echo $_POST['description']; }elseif(isset($description)) { echo $description; } ?>"
           style="width: 270px" />                               
</div>   
<div class="form-group">
    <label for="amount">Betrag: *</label>
    <input type="number" name="amount" id="amount" class="form-control" value="<?php if (isset($_POST['amount'])){ echo $_POST['amount']; }else { echo $amount; }?>"
           size="80" style="width:270px"  pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Betrag ein!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($billValidator->getAmountError())): ?>
        <span class="help-inline"><?php echo $billValidator->getAmountError(); ?></span>
    <?php endif; ?>                              
</div> 
<div class="form-group">
    <label for="datetopay">Zahlbar bis (tt.mm.jjjj): *</label>
    <input type="date" name="datetopay" id="datetopay" class="form-control" value="<?php if (isset($_POST['datetopay'])){ echo $_POST['datetopay']; }else { echo $datetopay; }?>" 
           style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Enddatum aus!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($billValidator->getPayableUntilError())): ?>
        <span class="help-inline"><?php echo $billValidator->getPayableUntilError(); ?></span>
    <?php endif; ?>                             
</div>
<div class="form-group">
    <label for="status">Status: </label>
    <select name="status" id="status" class="form-control" style="width: 270px">
        <?php
        if ($status == 1){
        echo '<option selected value=1>Offen</option>';    
        echo '<option value=2>Bezahlt</option>';
        echo '<option value=3>Verzug</option>';
        }elseif ($status ==2){
        echo '<option value=1>Offen</option>';    
        echo '<option selected value=2>Bezahlt</option>';
        echo '<option value=3>Verzug</option>';    
        }else{
        echo '<option value=1>Offen</option>';    
        echo '<option value=2>Bezahlt</option>';
        echo '<option selected value=3>Verzug</option>';    
        }
        ?>
    </select>
</div>