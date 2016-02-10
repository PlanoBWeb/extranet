<?php /* Smarty version 2.6.12, created on 2015-06-15 11:24:39
         compiled from admin/comunicado/dados.html */ ?>
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
				
		if(trim(frm.texto.value) == "")
		{
			alert("Preencha o Texto!");
			frm.texto.focus();
			return false;
		}
				
		return true;
	}

</script>
'; ?>


<!-- Conteúdo -->
<form class="form-admin" name="frm_cadastro" method="POST" enctype="multipart/form-data" onSubmit="return checa()">

    <p class="texto">CADASTRO COMUNICADO</p>

    <input type="hidden" name="acao" value="gravar" />
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />
    <input type="hidden" name="caminhoImagem" value="<?php echo $this->_tpl_vars['dados'][0]['caminhoImagem']; ?>
" />
    <input type="hidden" name="extencoeValidas" value="jpg|jpeg|gif|png">
   
    <label>*Título:</label>
    <input type="text" name="titulo" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
" class="formu" />
    
    <label>*Idioma:</label>
    <select name="idioma" class="formu">
        <option value="P" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'P'): ?>selected="selected"<?php endif; ?>>Português</option>
        <option value="I" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'I'): ?>selected="selected"<?php endif; ?>>Inglês</option>
        <option value="E" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'E'): ?>selected="selected"<?php endif; ?>>Espanhol</option>
    </select>
    
    <label>Imagem:</label>
    <input type="file" name="arquivo" size="50"/>
    <?php if ($this->_tpl_vars['dados'][0]['caminhoImagem']): ?>
    
    <img src="<?php echo $this->_tpl_vars['dados'][0]['caminhoImagem']; ?>
" width="100" border="0"/>
    <?php endif; ?>

    <label>*Texto:</label>
    <textarea name="texto" class="formu" cols="80" rows="13"><?php echo $this->_tpl_vars['dados'][0]['texto']; ?>
</textarea>
    
    
    <input name="submit" type="submit" class="botao" value="<?php echo $this->_tpl_vars['botao']; ?>
" />
    * Campos obrigatórios.

</form>
<!-- FIM Conteúdo -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>