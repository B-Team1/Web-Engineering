<div class="row">
    <label>Name: *</label>
    <input type="text" name="lastname" class="form-control" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Namen ein!')" oninput="setCustomValidity('')"/><span class="error"><?php echo $lastnameErr; ?></span>
</div>
<div class="row">
    <label>Vorname: *</label>
    <input type="text" name="firstname" class="form-control" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihren Vornamen ein!')" oninput="setCustomValidity('')"/>
    <span class="error"><?php echo $firstnameErr; ?></span>
</div>
<div class="row">
    <label>Passwort: *</label>
    <input type="password" name="password1" class="form-control" id="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" pattern=".{6,}" required oninvalid="this.setCustomValidity('Passwort benötigt mindestens 6 Zeichen')" oninput="setCustomValidity('')"/>
    <span class="error"><?php echo $password1Err; ?></span>
</div>   
<div class="row">
    <label>Passwort wiederholen: *</label>
    <input type="password" name="password2" class="form-control" id="password2" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" required oninvalid="this.setCustomValidity('Wiederholen Sie bitte das Passwort!')" oninput="setCustomValidity('')"/>
    <span class="error"><?php echo $password2Err; ?></span>
</div> 
<div class="row">
    <label>E-Mail Adresse: *</label>
    <input type="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="me@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre E-Mail Adresse ein!')" oninput="setCustomValidity('')" />
    <span class="error"><?php echo $emailErr; ?></span>
</div>