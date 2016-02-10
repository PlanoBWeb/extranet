<?php /* Smarty version 2.6.12, created on 2015-10-09 16:44:58
         compiled from admin/cliente/relacao-anotacao.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- Conteúdo -->
    <div class="container">
        <?php if ($this->_tpl_vars['dados']): ?> 
            <!-- Contato -->
            <table class="table">
                <br />
                <h1 class="titulo-pag">Consultar Anotações</h1>
                <a class="cor-tr-btn btn-acoes" href="adm_anotacao.php?id=<?php echo $_GET['id']; ?>
">Cadastrar Anotação</a> 
                <thead>
                    <tr class="cor-tr-btn">
                        <th>Titulo</th>
                        <th class="hidden-xs-down">Tipo</th>
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
                            <td><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['titulo']; ?>
</td>
                            <td class="hidden-xs-down"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['nome']; ?>
</td>
                            <td>
                                <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                    <a class="cor-tr-btn btn-acoes" href="adm_anotacao.php?acao=visualizar&idAnota=<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
">visualizar</a> 
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>
        <!-- Fim Contato -->
        <?php else: ?>
            <br><br>
            <a class="cor-tr-btn btn-acoes" href="adm_anotacao.php?id=<?php echo $_GET['id']; ?>
">Cadastrar Anotação</a> 
            <p class="sem-resultado">Não existe resultados</p>
        <?php endif; ?>       
    </div>
    <!-- FIM Conteúdo -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>