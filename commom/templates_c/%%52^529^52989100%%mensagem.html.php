<?php /* Smarty version 2.6.12, created on 2015-09-01 10:29:35
         compiled from mensagem.html */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administração</title>

<link rel="stylesheet" href="base.css" type="text/css">
</head>

<?php if ($this->_tpl_vars['mensagem']): ?>
<script language="JavaScript">
<!--
        alert('<?php echo $this->_tpl_vars['mensagem']; ?>
');
        <?php if ($this->_tpl_vars['redir']): ?>
                window.location.href='<?php echo $this->_tpl_vars['redir']; ?>
';
        <?php endif; ?>

        <?php echo $this->_tpl_vars['adendo']; ?>


        <?php if ($this->_tpl_vars['fechar']): ?>

                <?php if ($this->_tpl_vars['funcao_opener']): ?>
                        opener.<?php echo $this->_tpl_vars['funcao_opener']; ?>
;
                <?php endif; ?>
                this.close();
        <?php endif; ?>

        <?php if ($this->_tpl_vars['voltar']): ?>
                history.back();
        <?php endif; ?>
-->
</script>
<?php endif; ?>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="#ffffff" <?php if ($this->_tpl_vars['tipo'] == 'html' && $this->_tpl_vars['formulario'] && $this->_tpl_vars['form']['submit']): ?>OnLoad="auto_submit()"<?php endif; ?>>

<?php if ($this->_tpl_vars['tipo'] == 'html' && $this->_tpl_vars['formulario'] && $this->_tpl_vars['form']['submit']): ?>
<?php echo '
<script>
function auto_submit(){
        $form = document.all.tags("form");
        $form[0].submit();
}
</script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['tipo'] == 'html'): ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%" bgcolor="#ffffff">
 <tr><td align="center">
  <font size="2" color="red"><b><?php echo $this->_tpl_vars['mensagem']; ?>
</b></font>
        <?php if ($this->_tpl_vars['formulario']): ?>
                <form name="<?php echo $this->_tpl_vars['form']['nome']; ?>
" action="<?php echo $this->_tpl_vars['form']['acao']; ?>
" method=post <?php echo $this->_tpl_vars['form']['target']; ?>
>
                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arHidden']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <input type=hidden value='<?php echo $this->_tpl_vars['arHidden'][$this->_sections['i']['index']]['valor']; ?>
' name='<?php echo $this->_tpl_vars['arHidden'][$this->_sections['i']['index']]['nome']; ?>
'>
                <?php endfor; endif; ?>
                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['arButton']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
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
                        <input type=submit value='<?php echo $this->_tpl_vars['arButton'][$this->_sections['j']['index']]['valor']; ?>
' name='<?php echo $this->_tpl_vars['arButton'][$this->_sections['j']['index']]['nome']; ?>
'>
                <?php endfor; endif; ?>
                </form>
        <?php endif; ?>
 </td></tr>
</table>

<?php elseif ($this->_tpl_vars['tipo'] == 'confirm'): ?>
<script>

if(confirm('<?php echo $this->_tpl_vars['mensagem_confirm']; ?>
'))

        window.open('http://www.consultcad.com.br','','left=0, top=0, width=780, height=430, menubar=1');
        <?php echo $this->_tpl_vars['adendo']; ?>


</script>
<?php else: ?>
<script>

<?php if ($this->_tpl_vars['funcao']):  echo $this->_tpl_vars['funcao'];  endif; ?>

<?php if ($this->_tpl_vars['funcao_opener_fora']): ?>opener.<?php echo $this->_tpl_vars['funcao_opener_fora']; ?>
;<?php endif; ?>
<?php if ($this->_tpl_vars['fecha']): ?>window.close();<?php endif; ?>

<?php if ($this->_tpl_vars['volta']): ?>history.back();<?php endif; ?>

<?php if ($this->_tpl_vars['redir']): ?>window.location='<?php echo $this->_tpl_vars['redir']; ?>
';<?php endif; ?>
</script>
<?php endif; ?>
</body></html>
