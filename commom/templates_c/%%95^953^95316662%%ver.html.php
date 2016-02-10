<?php /* Smarty version 2.6.12, created on 2015-09-14 17:52:35
         compiled from admin/usuario/ver.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Conteúdo -->
	<div class="container">
		<form class="form-ver">

			<h1 class="titulo-pag">Usuarios</h1>
			
			<label><strong>*Pefil:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['perfilCompleto']; ?>
">	

			<label><strong>*Nome do usuário:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['email']; ?>
">	

			<label><strong>*E-mail do usuário:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['nome']; ?>
"> 
			<br>
			<br>
			<a href="adm_usuario.php?acao=pesquisar" class="btn-form" ><< voltar</a>
		</form>
	</div>
	<!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>