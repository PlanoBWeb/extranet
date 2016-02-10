<?php /* Smarty version 2.6.12, created on 2016-02-10 15:01:21
         compiled from admin/historico/ver.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Conteúdo -->
	<div class="container">
		<br>
        <h1 class="titulo-pag">Visualizar <?php echo $this->_tpl_vars['dados'][0]['tipo']; ?>
</h1>
		<div class="bloco-historico">
			<p><strong>Cliente: </strong> <?php echo $this->_tpl_vars['dados'][0]['empresa']; ?>
</p>

			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dados']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<div class="bloco-interno-historico">
					<p><strong><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['data_formatada']; ?>
 - (<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['nomeUsuario']; ?>
) </strong> <?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['descricao']; ?>
</p>
					<div class="bt-acoes-interna">
		                <?php if ($this->_tpl_vars['menuEdiUsuario']): ?>
		                    <a class="btn-form" href="adm_historico.php?acao=editar&idContato=<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
">editar</a> 
		                <?php endif; ?>
		                <?php if ($this->_tpl_vars['menuExcUsuario']): ?>
		                    <a class="btn-form" href="#" onclick="exclui(<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
, 'contato')">excluir</a>
		                <?php endif; ?>
		            </div>
				</div>
			<?php endfor; endif; ?>
		</div>    
    	<br>
		<a href="javascript:history.back()" class="btn-form" ><< voltar</a>
	</div>
	<!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>