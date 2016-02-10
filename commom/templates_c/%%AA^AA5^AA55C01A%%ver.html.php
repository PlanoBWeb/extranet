<?php /* Smarty version 2.6.12, created on 2015-09-10 10:25:09
         compiled from admin/tarefa/ver.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Conteúdo -->
	<div class="container">
		<form class="form-ver">
            <h1 class="titulo-pag">Tarefas</h1>
            
			<label><strong>Tarefa/Lembrete:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['tarefa_lembrete']; ?>
">	

			<label><strong>Titulo:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
"> 

            <label><strong>Data Início:</strong></label>
            <input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['data_inicio_formatada']; ?>
"> 

            <label><strong>Data Fim:</strong></label>
            <input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['data_fim_formatada']; ?>
"> 

			<label><strong>Descrição:</strong></label>
            <div class="campo-link-input"><?php echo $this->_tpl_vars['dados'][0]['descricao']; ?>
</div>

            <label><strong>Lembrar:</strong></label>
            <input type="text" disabled value="<?php if ($this->_tpl_vars['dados'][0]['lembrar'] == 1): ?>Sim<?php else: ?> Não <?php endif; ?>"> 
		</form>
    
        <br>
		<a href="adm_tarefa.php?acao=pesquisar" class="btn-form" ><< voltar</a>

	</div>
	<!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>