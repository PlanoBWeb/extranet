<?php /* Smarty version 2.6.12, created on 2016-02-10 15:36:30
         compiled from admin/cliente/relacao-contato.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- Conteúdo -->
    <div class="container">
        <?php if ($this->_tpl_vars['dadosContato']): ?> 
            <!-- Contato -->
            <table class="table">
                <br />
                <h1 class="titulo-pag">Consultar Contatos</h1>
                <thead>
                    <tr class="cor-tr-btn">
                        <th>Nome</th>
                        <th>Cliente</th>
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
                            <td><a href="adm_contato.php?acao=visualizar&id=<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['nome']; ?>
</a></td>
                            <td><?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['empresa']; ?>
</td>
                            <td class="hidden-xs-down"><a href="mailto:<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['email']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['email']; ?>
</a></td>
                            <td class="hidden-xs-down"><a href="tel:<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['dddcel'];  echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['celularLimpo']; ?>
">(<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['dddcel']; ?>
) <?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['celular']; ?>
</a></td>
                            <td>
                                <a class="ativa-select-acoes cor-tr-btn btn-acoes" href="#">Ações</a> 
                                <div class="select-acoes mg-lf-80">
                                    <?php if ($this->_tpl_vars['menuPesUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="adm_contato.php?acao=visualizar&id=<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
">visualizar</a> 
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuEdiUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="adm_contato.php?acao=editar&idContato=<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
">editar</a> 
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['menuExcUsuario']): ?>
                                        <a class="cor-tr-btn btn-acoes" href="#" onclick="excluiContato(<?php echo $this->_tpl_vars['dadosContato'][$this->_sections['i']['index']]['id']; ?>
, 'contato', <?php echo $this->_tpl_vars['valorPagina']; ?>
)">excluir</a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>
        <!-- Fim Contato -->
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