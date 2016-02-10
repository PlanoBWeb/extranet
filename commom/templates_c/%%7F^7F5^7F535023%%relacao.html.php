<?php /* Smarty version 2.6.12, created on 2016-02-10 15:16:54
         compiled from admin/fornecedor/relacao.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- Conteúdo -->
    <div class="container">
        <?php if ($this->_tpl_vars['dados']): ?>
            <div class="bloco-paginacao">
                <?php unset($this->_sections['j']);
$this->_sections['j']['start'] = (int)1;
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['Numpaginas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
if ($this->_sections['j']['start'] < 0)
    $this->_sections['j']['start'] = max($this->_sections['j']['step'] > 0 ? 0 : -1, $this->_sections['j']['loop'] + $this->_sections['j']['start']);
else
    $this->_sections['j']['start'] = min($this->_sections['j']['start'], $this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] : $this->_sections['j']['loop']-1);
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = min(ceil(($this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] - $this->_sections['j']['start'] : $this->_sections['j']['start']+1)/abs($this->_sections['j']['step'])), $this->_sections['j']['max']);
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                    <a class="<?php if ($this->_tpl_vars['Numpaginas'][$this->_sections['j']['index']] == $_GET['p']): ?> link-pag-ativo <?php endif; ?>" href="adm_fornecedor.php?acao=pesquisar&p=<?php echo $this->_tpl_vars['Numpaginas'][$this->_sections['j']['index']]; ?>
"><?php echo $this->_tpl_vars['Numpaginas'][$this->_sections['j']['index']]; ?>
</a>
                <?php endfor; endif; ?>
            </div> 
            <br>
            <table class="table">
                <h1 class="titulo-pag">Consultar Fornecedores</h1>
                <thead>
                    <tr class="cor-tr-btn">
                        <th>Fornecedor</th>
                        <th class="hidden-xs-down">Site</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
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
                        <tr class="hover-tr">
                            <td><a href="?acao=visualizar&id=<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['fornecedor']; ?>
</a></td>
                            <td class="hidden-xs-down"><a href="<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['siteCompleto']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['site']; ?>
</a></td>
                            <td>
                                <a class="ativa-select-acoes cor-tr-btn btn-acoes" href="#">Ações</a> 
                                <div class="select-acoes mg-lf-230">
                                    <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="?acao=visualizar&id=<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
">visualizar</a> 
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuEdiUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="?acao=editar&id=<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
">editar</a> 
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuExcUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="#" onclick="exclui(<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
, 'contato_fornecedor')">excluir</a>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="adm_contato_fornecedor.php?acao=pesquisar&id=<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
">Visualizar Contato Fornecedor</a> 
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>

            <div class="bloco-paginacao">
                <?php unset($this->_sections['j']);
$this->_sections['j']['start'] = (int)1;
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['Numpaginas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
if ($this->_sections['j']['start'] < 0)
    $this->_sections['j']['start'] = max($this->_sections['j']['step'] > 0 ? 0 : -1, $this->_sections['j']['loop'] + $this->_sections['j']['start']);
else
    $this->_sections['j']['start'] = min($this->_sections['j']['start'], $this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] : $this->_sections['j']['loop']-1);
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = min(ceil(($this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] - $this->_sections['j']['start'] : $this->_sections['j']['start']+1)/abs($this->_sections['j']['step'])), $this->_sections['j']['max']);
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                    <a class="<?php if ($this->_tpl_vars['Numpaginas'][$this->_sections['j']['index']] == $_GET['p']): ?> link-pag-ativo <?php endif; ?>" href="adm_fornecedor.php?acao=pesquisar&p=<?php echo $this->_tpl_vars['Numpaginas'][$this->_sections['j']['index']]; ?>
"><?php echo $this->_tpl_vars['Numpaginas'][$this->_sections['j']['index']]; ?>
</a>
                <?php endfor; endif; ?>
            </div> 
        <?php else: ?>
            <p class="sem-resultado">Não existe resultados</p>
        <?php endif; ?>       
    </div>
    <!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>