<?php /* Smarty version 2.6.12, created on 2015-06-15 11:17:49
         compiled from admin/video/dados.html */ ?>
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
		
		if(trim(frm.tag.value) == "")
		{
			alert("Preencha o Vídeo!");
			frm.tag.focus();
			return false;
		}
			/*
		if(trim(frm.arquivo.value) == "" && trim(frm.caminhoImagem.value) == "")
		{
			alert("Selecione a imagem do vídeo!");
			return false;
		}
		
		if(trim(frm.link.value) == "")
		{
			alert("Preencha o endereço do vídeo!");
			frm.link.focus();
			return false;
		}
			*/	
		return true;
	}

</script>
'; ?>


<!-- Conteúdo -->
    <form class="form-admin" name="frm_cadastro" method="POST" enctype="multipart/form-data" onSubmit="return checa()">
        <p class="texto">CADASTRO DE VÍDEOS</p>

        <input type="hidden" name="acao" value="gravar" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />
        <input type="hidden" name="caminhoImagem" value="<?php echo $this->_tpl_vars['dados'][0]['caminhoImagem']; ?>
" />
        <input type="hidden" name="extencoeValidas" value="jpg|jpeg|gif|png">
        
        <label>*Título:<label>
        <input type="text" name="titulo" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
" class="formu" />
        
        <label>*Idioma:</label>
        <select name="idioma" class="formu">
            <option value="P" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'P'): ?>selected="selected"<?php endif; ?>>Português</option>
            <option value="I" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'I'): ?>selected="selected"<?php endif; ?>>Inglês</option>
            <option value="E" <?php if ($this->_tpl_vars['dados'][0]['idioma'] == 'E'): ?>selected="selected"<?php endif; ?>>Espanhol</option>
        </select>

        <label>*Embed do vídeo:</label>
        <input type="text" name="tag" size="200" value='<?php echo $this->_tpl_vars['dados'][0]['tag']; ?>
' class="formu" />
<!--             	<textarea name="tag" class="formu" cols="80" rows="5"><?php echo $this->_tpl_vars['dados'][0]['tag']; ?>
</textarea> -->
        <label class="no-top">*Não especificar a largura e altura (width e height)</label>


        <input name="submit" type="submit" class="botao" value="<?php echo $this->_tpl_vars['botao']; ?>
" />
        <label>* Campos obrigatórios.</label>    
    </form>
<!-- FIM Conteúdo -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>