<?php Themes::getThemeHeader();?>

<script>
$(document).ready(function(){
    $('#login').click(function(){
        var username = document.getElementById("loginform").elements["username"].value;
        var password = document.getElementById("loginform").elements["password"].value;
        if($.trim(username).length>0 && $.trim(password).length>0){
            $.ajax({
                type: "POST",
                url: "login?form=login",
                data: {
                    'username':username,
                    'password':password
                },
                cache: false,
                beforeSend: function(){ $("#login").val('Conectando...');},
                success: function(response){
                    console.log(response);
                    if(response == 'true'){
                        //$("body").load("home").hide().fadeIn(1500).delay(6000);
                        //or
                        window.location.href = "home";
                    }else{
                        //Shake animation effect.
                        $("#login").val('Ingresar');
                        $("#error").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error: </span> "+response+" </div> ");
                    }
                }
            });
        }else{
            $("#error").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error:</span> Complete todos los campos</div> ");
        }
        return false;
    });
    $('#register').click(function(){
        var username = document.getElementById("registrarform").elements["username"].value;
        var email = document.getElementById("registrarform").elements["email"].value;
        var confirm_password  = document.getElementById("registrarform").elements["confirm_password"].value;
        var password = document.getElementById("registrarform").elements["password"].value;
        if(password !== confirm_password){
            $("#errorr").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error: </span> las contraseñas no coinciden</div> ");
            return false;
        }
        if($.trim(username).length>0 && $.trim(password).length>0 && $.trim(email).length>0 && $.trim(confirm_password).length>0){
            $.ajax({
                type: "POST",
                url: "login?form=register",
                data: {
                    'username':username,
                    'password':password,
                    'email':email,
                    'confirm_password':confirm_password
                },
                cache: false,
                beforeSend: function(){ $("#register").val('Conectando...');},
                success: function(response){
                    console.log(response);
                    if(response == 'true'){
                        //$("body").load("home").hide().fadeIn(1500).delay(6000);
                        //or
                        $("#errorr").html("<div class='alert alert-success' role='alert'>Usuario registrado correctamente!</div> ");
                    }else{
                        //Shake animation effect.
                        //$('#box2').shake();
                        $("#errorr").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>ERROR: </span>"+response+"</div> ");
                    }
                }
            });
        }else{
            $("#register").val('Registrar');
            $("#errorr").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error:</span> Complete todos los campos</div> ");
        }
        return false;
    });
});
</script>
<main class="ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="row pt-5 mx-auto">
            <div class="col-lg-5">
                <div class="card card-login">
                    <div class="card-header">Login</div>
                    <div class="card-body" id="box">
                        <form action="login" id="loginform" name="login" method="post">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" id="username" name="username" class="form-control" pattern="[a-zA-Z0-9]+" required>
                            </div>    
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="button" id="login" class="btn btn-primary mt-3" value="Ingresar" >
                            </div>
                        </form>
                        <div class="text-center">
                           
                            <!--<a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div id="error"></div>  
                        <?php if(isset($login_msj)){echo $login_msj;} ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body p-5" id="box2">
                        <h5 class="card-title text-center"><?php echo NombreApp;?></h5>
                        <p class="card-text pt-5">Aun no tiene una cuenta de <?php echo NombreApp;?>?, registrese ahora y empiece a disfrutar de nuestros servicios</p>
                        <form action="login" id="registrarform" name="registrar" method="post">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                            <input type="button" id="register" class="btn btn-primary mt-3" value="Registrar" >
                                <input type="reset" class="btn btn-default" value="Borrar">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div id="errorr"></div>
                        <?php if(isset($register_msj)){echo $register_msj;} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php Themes::getThemeFooter(); ?>