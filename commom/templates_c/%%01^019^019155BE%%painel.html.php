<?php /* Smarty version 2.6.12, created on 2016-02-05 10:55:42
         compiled from admin/tarefa/painel.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'admin/tarefa/painel.html', 43, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- Conteúdo -->
    <div class="container">
        <br />
        <h1 class="titulo-pag">Painel</h1><br />            

        <article class="bloco-filtro">
            <form method="post" class="form-bloco-filtro">
                <input type="hidden" name="acao" value="painel" />
                <label>FILTRO:</label>
                <select name="tarefa_lembrete">
                    <option value="">Tarefa/Lembrete</option>
                    <option value="TAR" <?php if ($this->_tpl_vars['form_tar_lem'] == 'TAR'): ?> selected <?php endif; ?>>Tarefa</option>
                    <option value="LEM" <?php if ($this->_tpl_vars['form_tar_lem'] == 'LEM'): ?> selected <?php endif; ?>>Lembrete</option>
                </select>

                <select name="usuario_filtro">
                    <option value="">Usuários</option>
                    <?php unset($this->_sections['u']);
$this->_sections['u']['name'] = 'u';
$this->_sections['u']['loop'] = is_array($_loop=$this->_tpl_vars['usuarios']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['u']['show'] = true;
$this->_sections['u']['max'] = $this->_sections['u']['loop'];
$this->_sections['u']['step'] = 1;
$this->_sections['u']['start'] = $this->_sections['u']['step'] > 0 ? 0 : $this->_sections['u']['loop']-1;
if ($this->_sections['u']['show']) {
    $this->_sections['u']['total'] = $this->_sections['u']['loop'];
    if ($this->_sections['u']['total'] == 0)
        $this->_sections['u']['show'] = false;
} else
    $this->_sections['u']['total'] = 0;
if ($this->_sections['u']['show']):

            for ($this->_sections['u']['index'] = $this->_sections['u']['start'], $this->_sections['u']['iteration'] = 1;
                 $this->_sections['u']['iteration'] <= $this->_sections['u']['total'];
                 $this->_sections['u']['index'] += $this->_sections['u']['step'], $this->_sections['u']['iteration']++):
$this->_sections['u']['rownum'] = $this->_sections['u']['iteration'];
$this->_sections['u']['index_prev'] = $this->_sections['u']['index'] - $this->_sections['u']['step'];
$this->_sections['u']['index_next'] = $this->_sections['u']['index'] + $this->_sections['u']['step'];
$this->_sections['u']['first']      = ($this->_sections['u']['iteration'] == 1);
$this->_sections['u']['last']       = ($this->_sections['u']['iteration'] == $this->_sections['u']['total']);
?>
                        <option value="<?php echo $this->_tpl_vars['usuarios'][$this->_sections['u']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['form_usuario'] == $this->_tpl_vars['usuarios'][$this->_sections['u']['index']]['id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['usuarios'][$this->_sections['u']['index']]['nome']; ?>
 </option>
                    <?php endfor; endif; ?>
                </select>

                <select name="cliente_filtro">
                    <option value="">Clientes</option>
                    <?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['clientes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
                        <option value="<?php echo $this->_tpl_vars['clientes'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['form_cliente'] == $this->_tpl_vars['clientes'][$this->_sections['c']['index']]['id']): ?> selected <?php endif; ?>> <?php echo $this->_tpl_vars['clientes'][$this->_sections['c']['index']]['empresa']; ?>
 </option>
                    <?php endfor; endif; ?>
                </select>
                
                <label> Data Inicio</label>
                <input name="data_inicio" type="date" <?php if ($this->_tpl_vars['form_data_inicio']): ?>value="<?php echo $this->_tpl_vars['form_data_inicio']; ?>
"<?php endif; ?>>

                <label> Data Fim</label>
                <input name="data_fim" type="date" <?php if ($this->_tpl_vars['form_data_fim']): ?>value="<?php echo $this->_tpl_vars['form_data_fim']; ?>
"<?php endif; ?>>

                <input type="submit" name="ok" value="Buscar">
            </form>
        </article>
        <?php if ($this->_tpl_vars['dados']): ?>
            <div class="row">
                <div>
                    <?php $this->assign('nmTipo', ((is_array($_tmp=@$this->_tpl_vars['nmTipo'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))); ?>
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
                        
                                <?php if ($this->_tpl_vars['nmTipo'] <> $this->_tpl_vars['dados'][$this->_sections['i']['index']]['tarefa_lembrete']): ?>
                                    </div>
                                    <div class="bloco-encapsula-tam-lem cor-bloco-tar-lem" <?php if ($this->_tpl_vars['form_tar_lem'] == 'TAR' || $this->_tpl_vars['form_tar_lem'] == 'LEM'): ?> style="width: 98%;" <?php endif; ?>>
                                        <h1 class="titulo-pag"><?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['tarefa_lembrete']; ?>
</h1>
                                <?php endif; ?>
                                <div class="col-sm-12 col-md-5 col-lg-5 bloco-tarefa bloco-tar-lem-default">
                                    <p class="titulo-tar-lem txt-default-tar-lem"><strong>Titulo:</strong> <?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['titulo']; ?>
</p>
                                    <p class="data-tar-lem txt-default-tar-lem"><strong>De:</strong> <?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['data_inicio']; ?>
  <strong>Até:</strong> <?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['data_fim']; ?>
 </p>
                                    <p class="desc-tar-lem txt-default-tar-lem"><strong>Descrição:</strong> <?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['descricao']; ?>
</p>
                                    <?php if ($this->_tpl_vars['dados'][$this->_sections['i']['index']]['empresa']): ?><p class="desc-tar-lem txt-default-tar-lem"><strong>Cliente:</strong> <?php echo $this->_tpl_vars['dados'][$this->_sections['i']['index']]['empresa']; ?>
</p><?php endif; ?>
                                </div>
                        <?php $this->assign('nmTipo', $this->_tpl_vars['dados'][$this->_sections['i']['index']]['tarefa_lembrete']); ?>                     
                    <?php endfor; endif; ?>
                </div>
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