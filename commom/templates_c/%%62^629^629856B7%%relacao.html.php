<?php /* Smarty version 2.6.12, created on 2015-06-15 11:15:11
         compiled from admin/institucional/relacao.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Conteúdo -->
<table cellspacing="0" cellpadding="0" border="0" width="93%" align="center" bgcolor="#FFFFFF"> 
    <tr>
        <td>
            <table class="tabela-mostra-dados" cellspacing="2" cellpadding="5" border="0" >
                <tr class="no-hover">
                    <td><p class="texto">INSTITUCIONAL</p></td>
                </tr>
                <tr style="background-color:#D5DDE3" height="20">
                    <td class="texto-consulta"><strong>Título</strong></td>
                    <td class="texto-consulta"><strong>Idioma</strong></td>
                    <td class="texto-consulta"><strong>Tipo de conteúdo</strong></td>
                    <td class="texto-consulta" width="10%"><strong>Opções</strong></td>
                </tr>
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
                <tr>
                    <td class="texto-consulta"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['titulo']; ?>
</td>
                    <td class="texto-consulta"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['idiomaFormat']; ?>
</td>
                    <td class="texto-consulta"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['tipoFormat']; ?>
</td>
                    <td class="texto-consulta" nowrap="nowrap">< <a href="?acao=editar&id=<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
">editar</a> > | < <a href="#" onclick="exclui(<?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['id']; ?>
)">excluir</a> ></td>
                </tr>
                <?php endfor; endif; ?>
            </table>
        </td>
    </tr>
</table>
<!-- FIM Conteúdo -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>