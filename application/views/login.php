<div class="main">

    <div class="units-row first-main"  >
        <div class="unit-100">
        
            <div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
                        México D.F. a <?=strftime('%A %d de %B de %Y', time())?> 
            </div>
          
            <div style="display: inline-block;padding-top: 1px;">    
                    <input type="text" name="go" class="input-on-black"  placeholder="Búsqueda" />
                    <span class="btn-append">
                        <button class="btn btn-white btn-outline" style="margin-right:5px;">Go</button>
                    </span>
            </div>
        </div>
    </div>

    <div class="units-row">
    
        <div class="unit-centered" style="width: 395px;">
            <div class="login-form">

                <h1 style="text-align:center;">Acceso al administrador del sistema</h1>
                <br>
                <?php
                    $attr = array('id'=>'form_admin_login','name'=>'form_admin_login','method'=>'POST','autocomplete'=>'off','role'=>'form');
                    echo form_open_multipart('login/verificar', $attr);
                ?>
                    <label>
                        Email
                        <input type="email" name="user-email" class="width-50" />
                    </label>
                    <label>
                        Password
                        <input type="password" name="user-password" class="width-50" />
                    </label>
                    <p>
                        <button class="btn">Log in</button>
                        <button class="btn">Cancel</button>
                    </p>
                <?php echo form_close(); ?>

                
            </div>
        
            
        </div>

    </div>

</div>