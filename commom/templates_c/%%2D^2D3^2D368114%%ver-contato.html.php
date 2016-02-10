<?php /* Smarty version 2.6.12, created on 2016-02-10 14:55:38
         compiled from admin/cliente/ver-contato.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Conteúdo -->
	<div class="container">
		<form class="form-ver">

			<h1 class="titulo-pag">Visualizar Contato</h1>
			
			<label><strong>Nome:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['nome']; ?>
">	

			<label><strong>Cargo:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['cargo']; ?>
">	

			<label><strong>E-mail:</strong></label>
			<div class="campo-link-input"><a href="mailto:<?php echo $this->_tpl_vars['dados'][0]['email']; ?>
"><?php echo $this->_tpl_vars['dados'][0]['email']; ?>
</a></div>

			<label><strong>E-mail pessoal:</strong></label>
			<div class="campo-link-input"><a href="mailto:<?php echo $this->_tpl_vars['dados'][0]['emailPessoal']; ?>
"><?php echo $this->_tpl_vars['dados'][0]['emailPessoal']; ?>
</a></div>

			<label><strong>Skype:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['skype']; ?>
">	

			<label><strong>Aniversário:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['aniversario']; ?>
">	

			<label><strong>Telefone:</strong></label>
			<div class="campo-link-input"><a href="tel:<?php echo $this->_tpl_vars['dados'][0]['dddtel'];  echo $this->_tpl_vars['dados'][0]['telefoneLimpo']; ?>
">( <?php echo $this->_tpl_vars['dados'][0]['dddtel']; ?>
 ) <?php echo $this->_tpl_vars['dados'][0]['telefone']; ?>
</a></div>

            <label><strong>Celular:</strong></label>
            <div class="campo-link-input"><a href="tel:<?php echo $this->_tpl_vars['dados'][0]['dddcel'];  echo $this->_tpl_vars['dados'][0]['celularLimpo']; ?>
">( <?php echo $this->_tpl_vars['dados'][0]['dddcel']; ?>
 ) <?php echo $this->_tpl_vars['dados'][0]['celular']; ?>
</a></div>
    
            <br>
            
            <div class="bt-acoes-interna">
                <?php if ($this->_tpl_vars['menuEdiUsuario']): ?>
                    <a class="btn-form" href="adm_contato.php?acao=editar&idContato=<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
">editar</a> 
                <?php endif; ?>
                <?php if ($this->_tpl_vars['menuExcUsuario']): ?>
                    <a class="btn-form" href="#" onclick="exclui(<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
, 'contato')">excluir</a>
                <?php endif; ?>

                <a href="<?php if ($this->_tpl_vars['existeId'] && $this->_tpl_vars['existeIdCliente']): ?>adm_cliente.php?acao=visualizar&id=<?php echo $this->_tpl_vars['existeIdCliente'];  else: ?>javascript:history.back()<?php endif; ?>" class="btn-form" ><< voltar</a>
            </div>
		</form>
	</div>
	<!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>