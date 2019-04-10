<style>
  label, input,select, textarea { width: 100%; }
  label{     
    display: inline-block;
    margin-bottom: .5rem; }
  .form-group{ margin-bottom: 5px; }
  .form-control{
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
  select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 2px);
  }
</style>

<?php 
  $imoveis_meta_data = get_post_meta($post->ID); 
?>

<!-- preço -->
<div class="form-group">
    <label>Preço</label>
    <input type="text" value="<?= number_format($imoveis_meta_data['preco'][0], 2, ',','.') ?>" name="preco" class="form-control">
</div>
<!-- dormitorio -->
<div class="form-group">
  <label>Dormitórios</label>
  <select name="dormitorio" class="form-control">
    <option value="" <?php if ( $imoveis_meta_data['dormitorio'][0]=='0') { ?>selected="selected"<?php } ?> >0</option>
    <option value="1" <?php if ( $imoveis_meta_data['dormitorio'][0]=='1') { ?>selected="selected"<?php } ?> >1</option>
    <option value="2" <?php if ( $imoveis_meta_data['dormitorio'][0]=='2') { ?>selected="selected"<?php } ?> >2</option>
    <option value="3" <?php if ( $imoveis_meta_data['dormitorio'][0]=='3') { ?>selected="selected"<?php } ?> >3</option>
    <option value="4" <?php if ( $imoveis_meta_data['dormitorio'][0]=='4') { ?>selected="selected"<?php } ?> >4</option>
    <option value="5" <?php if ( $imoveis_meta_data['dormitorio'][0]=='5') { ?>selected="selected"<?php } ?> >5</option>
  </select>
</div>
<!-- vagas -->
<div class="form-group">
  <label>Vagas</label>
  <select name="vagas" class="form-control">
    <option value="" <?php if ( $imoveis_meta_data['vagas'][0]=='0') { ?>selected="selected"<?php } ?> >0</option>
    <option value="1" <?php if ( $imoveis_meta_data['vagas'][0]=='1') { ?>selected="selected"<?php } ?> >1</option>
    <option value="2" <?php if ( $imoveis_meta_data['vagas'][0]=='2') { ?>selected="selected"<?php } ?> >2</option>
    <option value="3" <?php if ( $imoveis_meta_data['vagas'][0]=='3') { ?>selected="selected"<?php } ?> >3</option>
    <option value="4" <?php if ( $imoveis_meta_data['vagas'][0]=='4') { ?>selected="selected"<?php } ?> >4</option>
    <option value="5" <?php if ( $imoveis_meta_data['vagas'][0]=='5') { ?>selected="selected"<?php } ?> >5</option>
  </select>
</div>
<!-- area total -->
<div class="form-group">
    <label>Área total</label>
    <input type="text" name="area" value="<?= $imoveis_meta_data['area'][0] ?>" class="form-control" placeholder="">
</div>
<!-- opcionais -->
<div class="form-group">
  <label>Opcionais</label>
  <textarea class="form-control" name="opcionais" rows="3"><?= $imoveis_meta_data['opcionais'][0] ?>
  </textarea>
</div>