<?php /* Smarty version 2.6.12, created on 2016-02-05 17:43:27
         compiled from admin/historico/dados.html */ ?>
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

	    <h1 class="titulo-pag">Histórico</h1>

        <label>Cliente:</label>
        <select name="cliente">
        	<option value="Clientes">Clientes</option>
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
" <?php if ($this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['dados'][0]['idcliente']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['empresa']; ?>
</option>
            <?php endfor; endif; ?>
        </select>

        <label>Tipo histórico:</label>
        <select name="tipoHist">
        	<option value="">Selecione o tipo</option>
            <option value="HA" <?php if ('HA' == $this->_tpl_vars['dados'][0]['tipoSigla']): ?>selected="selected"<?php endif; ?>>Histórico Adwords</option>
            <option value="HS" <?php if ('HS' == $this->_tpl_vars['dados'][0]['tipoSigla']): ?>selected="selected"<?php endif; ?>>Histórico SEO</option>
            <option value="HG" <?php if ('HG' == $this->_tpl_vars['dados'][0]['tipoSigla']): ?>selected="selected"<?php endif; ?>>Histórico geral</option>
            <option value="HP" <?php if ('HP' == $this->_tpl_vars['dados'][0]['tipoSigla']): ?>selected="selected"<?php endif; ?>>Histórico produção</option>
        </select>
	    
	    <label>*Titulo:</label>
	    <input type="text" name="titulo" value="<?php echo $this->_tpl_vars['dados'][0]['titulo']; ?>
" />

	    <label>*Descrição:</label>
	    <textarea name="descricao"><?php echo $this->_tpl_vars['dados'][0]['descricao']; ?>
</textarea>

	    <label>*Data:</label>
	    <input type="date" name="data" value="<?php if ($this->_tpl_vars['dados'][0]['data']):  echo $this->_tpl_vars['dados'][0]['data'];  else:  echo $this->_tpl_vars['dataAtual'];  endif; ?>" />

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
			
			if(trim(frm.cliente.value)=="Clientes")
			{
				alert(msg + "Cliente!");
				frm.cliente.focus();
				return false;
			}

			if(trim(frm.tipoHist.value)=="")
			{
				alert(msg + "Tipo!");
				frm.tipoHist.focus();
				return false;
			}

			if(trim(frm.titulo.value)=="")
			{
				alert(msg + "Titulo!");
				frm.titulo.focus();
				return false;
			}
			
			if(trim(frm.descricao.value) == "")
			{
				alert(msg + "Descrição!");
				frm.descricao.focus();
				return false;
			}	

			if(trim(frm.data.value) == "")
			{
				alert(msg + "Data!");
				frm.data.focus();
				return false;
			}	

			frm.submit();
		}
	</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>