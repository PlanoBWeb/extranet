<?php /* Smarty version 2.6.12, created on 2015-06-15 11:19:15
         compiled from admin/material/dados.html */ ?>
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
			alert("Preencha o campo Título!");
			frm.titulo.focus();
			return false;
		}
		
				
		return true;
	}

</script>
'; ?>


<!-- Conteúdo -->
    <form class="form-admin" name="frm_cadastro" method="POST" enctype="multipart/form-data" onSubmit="return checa()">
        <input type="hidden" name="acao" value="gravar" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />
        <input type="hidden" name="caminhoImagem" value="<?php echo $this->_tpl_vars['dados'][0]['caminhoImagem']; ?>
" />
        <input type="hidden" name="extencoeValidas" value="zip|pdf|psd|jpg|png|tiff">
        <input type="hidden" name="caminhoImagem2" value="<?php echo $this->_tpl_vars['dados'][0]['caminhoImagem2']; ?>
" />
        <input type="hidden" name="extencoeValidas2" value="jpg|png">

        <p class="texto">CADASTRO MATERIAL</p>

        <label>*Título:</label>
        <input type="text" name="titulo" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
" class="formu" />
        
        
        <label>*Idioma:</label>
            <select name="idioma" class="formu">
                <option value="P" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'P'): ?>selected="selected"<?php endif; ?>>Português</option>
                <option value="I" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'I'): ?>selected="selected"<?php endif; ?>>Inglês</option>
                <option value="E" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'E'): ?>selected="selected"<?php endif; ?>>Espanhol</option>
            </select>

        <label>Arquivo:</label>
        <input type="file" name="arquivo" size="50"/>

        <?php if ($this->_tpl_vars['dados'][0]['caminhoImagem']): ?>
            <?php echo $this->_tpl_vars['dados'][0]['caminhoImagem']; ?>

        <?php endif; ?>
        
        <label>Thumbnail:</label>
        <input type="file" name="arquivo2" size="50"/>

        <?php if ($this->_tpl_vars['dados'][0]['caminhoImagem2']): ?>
            <img src="<?php echo $this->_tpl_vars['dados'][0]['caminhoImagem2']; ?>
" border="0"/>
        <?php endif; ?>
        
        <input name="submit" type="submit" class="botao" value="<?php echo $this->_tpl_vars['botao']; ?>
" />
        <label class="no-top">* Campos obrigatórios.</label>

    </form>
<!-- FIM Conteúdo -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>