<div class="row">
    <label>* = Pflichtfelder</label>
</div>
<div class="row">
    <label>E-Mail Adresse: *</label>
    <input type="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="me@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required oninvalid="this.setCustomValidity('Geben Sie bitte Ihre E-Mail Adresse ein!')" oninput="setCustomValidity('')" />
    <?php if (!empty($userValidator->getEmailError())): ?>
        <span class="help-inline"><?php echo $userValidator->getEmailError(); ?></span>
    <?php endif; ?>
</div>
<div class="row">
    <label>Passwort: *</label>
    <input type="password" name="password1" class="form-control" id="password1" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" pattern=".{6,}" required oninvalid="this.setCustomValidity('Geben Sie bitte ein Passwort mit mindestens 6 Zeichen ein!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($userValidator->getPwError())): ?>
        <span class="help-inline"><?php echo $userValidator->getPwError(); ?></span>
    <?php endif; ?>
</div>   
<div class="row">
    <label>Passwort wiederholen: *</label>
    <input type="password" name="password2" class="form-control" id="password2" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" required oninvalid="this.setCustomValidity('Wiederholen Sie bitte das Passwort!')" oninput="setCustomValidity('')"/>
    <?php if (!empty($userValidator->getPw2Error())): ?>
        <span class="help-inline"><?php echo $userValidator->getPw2Error(); ?></span>
    <?php endif; ?>
</div> 
