<!--Rodapé-->

        <a href="#top" class="fa fa-arrow-circle-up" aria-hidden="true"></a>
        <div class="" style="padding-top: 30px">
            <center>© Copyright 2017. Todos os direitos reservados.</center>
        </div>
    </div>
</div>
</div>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>
    
<script>
$(document).ready(function(){
    
    $("#buscar_dash").on("change paste keyup", function() {
        var buscar_dash = $(this).val();
        
        $.post('busca_dash.php',{ titulo: buscar_dash },function(data){
            //mostrando o retorno do post
            console.log(data);
            $("#custom-search-form").append(data.html);
        });
    });
    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('a[href="#top"]').fadeIn();
        } else {
            $('a[href="#top"]').fadeOut();
        }
    });

    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop : 0},500);
        return false;
    });
});    
</script>

</body>
</html>
