<?php /* Smarty version 2.6.12, created on 2016-02-10 14:51:23
         compiled from admin/rodape.html */ ?>
    <script>window.jQuery || document.write('<script src="commom/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="commom/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php echo '
    <script type="text/javascript">
        
        $(document).mouseup(function (e){
            var bloco_acoes = $( ".select-acoes" );
            if( !bloco_acoes.is(e.target) && bloco_acoes.has(e.target).length === 0){
                $( bloco_acoes ).hide();
            }
        });

        // Botão ações
        $(document).ready(function(){
            var altura_tela = $(window).width();
            $(".ativa-select-acoes").click(function(){
                if (altura_tela <= 768) {
                    event.preventDefault();
                    $(this).next( ".select-acoes" ).slideToggle(\'slow\').siblings(\'.tgl:visible\').slideToggle(\'fast\');
                }
            });
        });


        // Drop menu mobile
        $(document).ready(function(){
            var altura_tela = $(window).width();
            $(".dropdown-toggle").click(function(){
                if (altura_tela <= 768) {
                    event.preventDefault();
                    $(this).parent().find(".dropdown-menu").slideToggle();
                }
            });
        });

        window.onresize = function() {
            
            // Menu topo drop
            $(".dropdown-toggle").click(function(){
                if (window.innerWidth <= 768) {
                    event.preventDefault();
                    $(this).parent().find(".dropdown-menu").slideToggle();
                }
            });

            // Botão ações
            $(".ativa-select-acoes").click(function(){
                if (window.innerWidth <= 768) {
                    event.preventDefault();
                    $(this).next( ".select-acoes" ).slideToggle(\'slow\').siblings(\'.tgl:visible\').slideToggle(\'fast\');
                }
            });
        }


        // $(\'.ativa-select-acoes\').mouseenter(function(){
        //     $(this).next( ".select-acoes" ).show();
        // });

        // $(\'.ativa-select-acoes\').mouseenter(function(){
        //     $(this).next( ".select-acoes" ).show();
        // });

        // $(\'.ativa-select-acoes\').mouseleave(function(){
        //     $(this).next( ".select-acoes" ).hide();
        // });
        
    </script>
'; ?>