<?php /* Smarty version 2.6.12, created on 2015-09-14 15:40:50
         compiled from admin/cliente/ver-anotacao.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Conteúdo -->
	<div class="container">
		<form class="form-ver">
			<h1 class="titulo-pag">Clientes</h1>
			<label><strong>Empresa:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['empresa']; ?>
">	

			<label><strong>Tipo:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['nome']; ?>
">	

			<label><strong>Titulo:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
">	

			<label><strong>Descrição:</strong></label>
			<div class="campo-link-input"><?php echo $this->_tpl_vars['dados'][0]['descricao']; ?>
</div>
			
            <br>
            <a href="javascript:history.back()" class="btn-form" ><< voltar</a>
		</form>
	</div>
	<!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>