<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="form-group">
    <label for="invoicedate">Rechnungsdatum (tt.mm.jjjj): *</label>
    <input type="date" name="invoicedate" id="invoicedate" class="form-control" pattern="\d{1,2}.\d{1,2}.\d{4}" value="<?php if (isset($_POST['invoicedate'])) echo $_POST['invoicedate']; ?>" 
           style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Rechnungsdatum aus!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($billValidator->getDateError())): ?>
        <span class="help-inline"><?php echo $billValidator->getDateError(); ?></span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="apartment">Wohnung: *</label>
    <select name="apartment" id="apartment" class="form-control" style="width: 270px" required>

        <?php
        
        
        //So sollte es nicht sein!
        //$sql = mysqli_query($connection, "SELECT name FROM apartement");
        //
        
        //while ($row = $sql->fetch_assoc()){
        //    echo "<option value=\"owner1\">" . $row['username'] . "</option>";
        //}
        ?>
    </select>                                
</div>
<div class="form-group">
    <label for="description">Beschreibung:</label>
    <input type="text" name="description" id="description" class="form-control" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"
           style="width: 270px" />                               
</div>   
<div class="form-group">
    <label for="amount">Betrag: *</label>
    <input type="number" name="amount" id="amount" class="form-control" value="<?php if (isset($_POST['amount'])) echo $_POST['amount']; ?>"
           size="80" style="width:270px"  pattern="[0-9]" step="any" oninvalid="this.setCustomValidity('Geben Sie bitte den Betrag ein!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($billValidator->getAmountError())): ?>
        <span class="help-inline"><?php echo $billValidator->getAmountError(); ?></span>
    <?php endif; ?>                              
</div> 
<div class="form-group">
    <label for="datetopay">Zahlbar bis: *</label>
    <input type="date" name="datetopay" id="datetopay" class="form-control" value="<?php if (isset($_POST['datetopay'])) echo $_POST['datetopay']; ?>" 
           style="width:270px" required oninvalid="this.setCustomValidity('Wählen Sie bitte das Enddatum aus!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($billValidator->getPayableUntilError())): ?>
        <span class="help-inline"><?php echo $billValidator->getPayableUntilError(); ?></span>
    <?php endif; ?>                             
</div>
<div class="form-group">
    <label for="status">Status: </label>
    <select name="status" id="status" class="form-control" style="width: 270px">
        <option class="yellow" value="offen">Offen</option>
        <option class="green" value="bezahlt">Bezahlt</option>
        <option class="red" value="verzug">Verzug</option>
    </select>
</div>