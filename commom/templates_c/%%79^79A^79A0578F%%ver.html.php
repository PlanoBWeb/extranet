<?php /* Smarty version 2.6.12, created on 2016-02-10 15:33:03
         compiled from admin/fornecedor/ver.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Conteúdo -->
	<div class="container">
		<form class="form-ver">
            <h1 class="titulo-pag">Visualizar Fornecedor</h1>

			<label><strong>Fornecedor:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['fornecedor']; ?>
">	

			<label><strong>Site:</strong></label>
			<div class="campo-link-input"><a href="http://<?php echo $this->_tpl_vars['dados'][0]['site']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dados'][0]['site']; ?>
</a></div>

			<label><strong>CNPJ:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['cnpj']; ?>
"> 

			<label><strong>Endereço:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['endereco']; ?>
">	

			<label><strong>Complemento:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['complemento']; ?>
">	

            <label><strong>CEP:</strong></label>
            <input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['cep']; ?>
">    

			<label><strong>Bairro:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['bairro']; ?>
"> 

			<label><strong>Cidade:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['cidade']; ?>
">	

			<label><strong>Estado:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['estado']; ?>
">	

			<label><strong>Telefone:</strong></label>
			<div class="campo-link-input"><a href="tel:<?php echo $this->_tpl_vars['dados'][0]['dddtel'];  echo $this->_tpl_vars['dados'][0]['telefone']; ?>
">( <?php echo $this->_tpl_vars['dados'][0]['dddtel']; ?>
 ) <?php echo $this->_tpl_vars['dados'][0]['telefone']; ?>
</a></div>

			<label><strong>Servicos:</strong></label>
			<input type="text" disabled value="<?php echo $this->_tpl_vars['dados'][0]['servicos']; ?>
">	
            
            <div class="bt-acoes-interna">
                <?php if ($this->_tpl_vars['menuEdiUsuario']): ?>
                    <a class="btn-form" href="adm_fornecedor.php?acao=editar&id=<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
">editar</a> 
                <?php endif; ?>
                <?php if ($this->_tpl_vars['menuExcUsuario']): ?>
                    <a class="btn-form" href="#" onclick="exclui(<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
, 'fornecedor')">excluir</a>
                <?php endif; ?>
            </div>
		</form>
        
        <?php if ($this->_tpl_vars['dadosContato']): ?> 
		<!-- Contato -->
            <table class="table">
                <thead>
                    <tr class="cor-tr-btn">
                        <th>Nome</th>
                        <th class="hidden-xs-down">E-mail</th>
                        <th class="hidden-xs-down">Celular</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dadosContato']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <tr class="hover-tr">
                            <td><a href="adm_contato_fornecedor.php?acao=visualizar&id=<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['nome']; ?>
</a> </td>
                            <td class="hidden-xs-down"><a href="mailto:<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['email']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['email']; ?>
</a></td>
                            <td class="hidden-xs-down"><a href="tel:<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['dddcel'];  echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['celular']; ?>
">(<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['dddcel']; ?>
) <?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['celular']; ?>
</a></td>
                            <td>
                                <a class="ativa-select-acoes cor-tr-btn btn-acoes" href="#">Ações</a> 
                                <div class="select-acoes mg-lf-80">
                                    <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="adm_contato_fornecedor.php?acao=visualizar&id=<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
">visualizar</a> 
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuEdiUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="adm_contato_fornecedor.php?acao=editar&id=<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
">editar</a> 
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuExcUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="#" onclick="exclui(<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
, 'contato_fornecedor')">excluir</a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>
        <!-- Fim Contato -->
        <?php endif; ?>

        <br>
		<a href="adm_fornecedor.php?acao=pesquisar" class="btn-form" ><< voltar</a>

	</div>
	<!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>