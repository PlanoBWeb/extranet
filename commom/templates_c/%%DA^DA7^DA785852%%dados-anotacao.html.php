<?php /* Smarty version 2.6.12, created on 2015-10-09 16:44:42
         compiled from admin/cliente/dados-anotacao.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Conteúdo -->
    <form name="frm_cadastro" method="POST">
	    <input type="hidden" name="acao" value="gravar" />
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />
	    <input type="hidden" name="idcliente" value="<?php echo $this->_tpl_vars['dados'][0]['idcliente']; ?>
" />
	    <h1 class="titulo-pag">Anotação</h1>
 
	    <label>Clientes:</label>
        <select name="cliente">
        	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dadosCliente']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            	<option value="<?php echo $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['empresa'] == $this->_tpl_vars['dadosCliente'][0]['empresa'] || $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['idClienteAnota']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['empresa']; ?>
</option>
            <?php endfor; endif; ?>
        </select>

        <label>Tipo:</label>
        <select name="tipo" id="seleciona_tipo">
        	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dadosTipo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            	<option value="<?php echo $this->_tpl_vars['dadosTipo'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['dadosTipo'][$this->_sections['i']['index']]['nome'] == "\"{".($this->_tpl_vars['dadosTipo'][0]).".nome"): ?>"}selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['dadosTipo'][$this->_sections['i']['index']]['nome']; ?>
</option>
            <?php endfor; endif; ?>
            <option class="outros" value="outros">Outros</option>
        </select>

		<label class="nome_tipo">*Nome do tipo:</label>
	    <input type="text" class="nome_tipo" name="nome_tipo" />        

	    <label>*Titulo:</label>
	    <input type="text" name="titulo" value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
" />

	    <label>*Descrição:</label>
	    <textarea name="descricao"><?php echo $this->_tpl_vars['dados'][0]['descricao']; ?>
</textarea>

		<input name="submit" type="submit" class="btn-form top-btn" value="<?php echo $this->_tpl_vars['botao']; ?>
" onclick="return checa();" /><br>
	    <label class="no-top">* Campos obrigatórios.</label>
    </form>
<!-- FIM Conteúdo -->
<?php echo '	
	<script>
		function checa()
		{
			frm = document.frm_cadastro;
			msg = "Preencha o campo ";
			
			if(trim(frm.titulo.value)=="")
			{
				alert(msg + "Titulo!");
				frm.titulo.focus();
				return false;
			}

			if(trim(frm.descricao.value)=="")
			{
				alert(msg + "Descrição!");
				frm.descricao.focus();
				return false;
			}

			frm.submit();
		}

		$(\'#seleciona_tipo\').change(function(){
			obj = $(\'#seleciona_tipo\').val();
			if(obj == "outros"){
				$(\'.nome_tipo\').css(\'display\', \'block\');
			}else{
				$(\'.nome_tipo\').css(\'display\', \'none\');
			}
		});
	</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>