<?php $list_category = $this->Model_backend->show_all_by_father(0,$this->post_type_id); ?>
<?php 
if(isset($post_category_id)){
   $array_category = json_decode($post_category_id);
}else{
   $array_category = [];
} 
?>
<style type="text/css">
 #test{
   border:1px solid #ccc;
   padding: 10px 20px 0px 30px;
   width:100%;
   height:200px;
   overflow-x:auto;
   overflow-y:auto;
}
</style>
<div class="mb-3">
      <label class="form-label">Danh mục phụ</label>
      <div id="test">
       <?php foreach ($list_category as $value1): ?>
         <?php $list_lever2 = $this->Model_backend->show_all_by_father($value1['id'],$this->post_type_id); ?>
         <div class="form-check">
            <input class="form-check-input" type="checkbox" name="post_category_id[]" value="<?= $value1['id']; ?>" id="formCheck<?= $value1['id']; ?>" <?php if(in_array($value1['id'],$array_category)){ echo 'checked'; } ?>>
            <label class="form-check-label" for="formCheck<?= $value1['id']; ?>">
               <?php $this->Model_main->get_lang($value1['name'],$this->id_language); ?>
            </label>
         </div>
         <?php foreach ($list_lever2 as $value2): ?>
            <?php $list_lever3 = $this->Model_backend->show_all_by_father($value2['id'],$this->post_type_id); ?>
            <div class="form-check">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="post_category_id[]" value="<?= $value2['id']; ?>" id="formCheck<?= $value2['id']; ?>" <?php if(in_array($value2['id'],$array_category)){ echo 'checked'; } ?>>
               <label class="form-check-label" for="formCheck<?= $value2['id']; ?>">
                  <?php $this->Model_main->get_lang($value2['name'],$this->id_language); ?>
               </label>
            </div>
            <?php foreach ($list_lever3 as $value3): ?>
               <?php $list_lever4 = $this->Model_backend->show_all_by_father($value3['id'],$this->post_type_id); ?>
               <div class="form-check">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="post_category_id[]" value="<?= $value3['id']; ?>" id="formCheck<?= $value3['id']; ?>" <?php if(in_array($value3['id'],$array_category)){ echo 'checked'; } ?>>
                  <label class="form-check-label" for="formCheck<?= $value3['id']; ?>">
                     <?php $this->Model_main->get_lang($value3['name'],$this->id_language); ?>
                  </label>
               </div>
               <?php foreach ($list_lever4 as $value4): ?>
                  <?php $list_lever5 = $this->Model_backend->show_all_by_father($value4['id'],$this->post_type_id); ?>
                  <div class="form-check">
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="post_category_id[]" value="<?= $value4['id']; ?>" id="formCheck<?= $value4['id']; ?>" <?php if(in_array($value4['id'],$array_category)){ echo 'checked'; } ?>>
                     <label class="form-check-label" for="formCheck<?= $value4['id']; ?>">
                        <?php $this->Model_main->get_lang($value4['name'],$this->id_language); ?>
                     </label>
                  </div>
                  <?php foreach ($list_lever5 as $value5): ?>
                     <div class="form-check">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" name="post_category_id[]" value="<?= $value5['id']; ?>" id="formCheck<?= $value5['id']; ?>" <?php if(in_array($value5['id'],$array_category)){ echo 'checked'; } ?>>
                        <label class="form-check-label" for="formCheck<?= $value5['id']; ?>">
                           <?php $this->Model_main->get_lang($value5['name'],$this->id_language); ?>
                        </label>
                     </div>
                  <?php endforeach ?>
               <?php endforeach ?>
            <?php endforeach ?>
         <?php endforeach ?>
      <?php endforeach ?>
   </div>
</div>