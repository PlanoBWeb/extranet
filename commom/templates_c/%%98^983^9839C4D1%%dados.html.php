<?php /* Smarty version 2.6.12, created on 2015-06-15 11:17:03
         compiled from admin/segmento/dados.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>

	function checa()
	{
		frm = document.frm_cadastro;
		
		if(trim(frm.titulo.value) == "")
		{
			alert("Preencha o campo Título em Português!");
			frm.titulo.focus();
			return false;
		}

		if(trim(frm.tituloES.value) == "")
		{
			alert("Preencha o campo Título em Espanhol!");
			frm.tituloES.focus();
			return false;
		}

		if(trim(frm.tituloIN.value) == "")
		{
			alert("Preencha o campo Título em Inglês!");
			frm.tituloIN.focus();
			return false;
		}
				
		return true;
	}

</script>
'; ?>


<!-- Conteúdo -->
    <form class="form-admin" name="frm_cadastro" method="POST" enctype="multipart/form-data" onSubmit="return checa()">
        <p class="texto">CADASTRO DE SEGMENTO</p>

        <input type="hidden" name="acao" value="gravar" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />
        
        <label>*Título Português:</label>
        <input type="text" name="titulo" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
" class="formu" />

        <label>*Título Espanhol:</label>
        <input type="text" name="tituloES" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['tituloES']; ?>
" class="formu" />

        <label>*Título Inglês:</label>
        <input type="text" name="tituloIN" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['tituloIN']; ?>
" class="formu" />
        
        <input name="submit" type="submit" class="botao" value="<?php echo $this->_tpl_vars['botao']; ?>
" />
        <label class="no-top">* Campos obrigatórios.</label>
    </form>
</table>
<!-- FIM Conteúdo -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>