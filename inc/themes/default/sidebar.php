<script>
$(document).ready(function(){
    $('#btndashboard').click(function(){
        $.ajax({
            type:"POST",
            url:"home",
            data:{
                'page':'dashboard'
            },
            cache:false,
            success: function(response){
                $("#main").html(response);
            }
        });
    });
    $('#btnperfil').click(function(){
        $.ajax({
            type:"POST",
            url:"home",
            data:{
                'page':'perfil'
            },
            cache:false,
            success: function(response){
                $("#main").html(response);
            }
        });
    });
    $('#btnabout').click(function(){
        $.ajax({
            type:"POST",
            url:"home",
            data:{
                'page':'about'
            },
            cache:false,
            success: function(response){
                $("#main").html(response);
            }
        });
    });
});
</script>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="nav position-sticky pt-3">
        <ul class="nav flex-column w-100">
            <li class="nav-item navbar-hover">
                <a href="#" id="btndashboard" class="nav-link"><span data-feather="home"></span> Dashboard</a>
            </li>
            <li class="nav-item navbar-hover">
                <a href="#" id="btnperfil" class="nav-link"><span data-feather="home"></span> Perfil</a>
            </li>
            <li class="nav-item navbar-hover">
                <a href="#" id="btnabout" class="nav-link"><span data-feather="home"></span> About</a>
            </li>
        </ul>
    </div>
</nav>