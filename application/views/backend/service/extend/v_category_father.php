<?php $list_category = $this->Model_backend->show_all_by_father(0,$this->post_type_id); ?>
<div class="mb-3">
   <label class="form-label">Danh mục chính</label>
   <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="father_id">
      <option value="0" <?php if(isset($father_id) && $father_id == 0){ echo 'selected'; } ?>>Danh mục cha</option>
      <optgroup label="Danh mục chọn">
         <!-- Lấy 5 cấp của danh mục cha -->
         <?php foreach ($list_category as $value1): ?>
            <?php $list_lever2 = $this->Model_backend->show_all_by_father($value1['id'],$this->post_type_id); ?>
            <option value="<?= $value1['id']; ?>" <?php if(isset($father_id) && $father_id == $value1['id']){ echo 'selected'; } ?>><b><?= $this->Model_main->get_lang_main($value1['name'],$this->language_main); ?></b></option>
            <?php foreach ($list_lever2 as $value2): ?>
               <?php $list_lever3 = $this->Model_backend->show_all_by_father($value2['id'],$this->post_type_id); ?>
               <option value="<?= $value2['id']; ?>" <?php if(isset($father_id) && $father_id == $value2['id']){ echo 'selected'; } ?>>--- <?= $this->Model_main->get_lang_main($value2['name'],$this->language_main); ?></option>
               <?php foreach ($list_lever3 as $value3): ?>
                  <?php $list_lever4 = $this->Model_backend->show_all_by_father($value3['id'],$this->post_type_id); ?>
                  <option value="<?= $value3['id']; ?>" <?php if(isset($father_id) && $father_id == $value3['id']){ echo 'selected'; } ?>>------ <?= $this->Model_main->get_lang_main($value3['name'],$this->language_main); ?></option>
                  <?php foreach ($list_lever4 as $value4): ?>
                     <?php $list_lever5 = $this->Model_backend->show_all_by_father($value4['id'],$this->post_type_id); ?>
                     <option value="<?= $value4['id']; ?>" <?php if(isset($father_id) && $father_id == $value4['id']){ echo 'selected'; } ?>>--------- <?= $this->Model_main->get_lang_main($value4['name'],$this->language_main); ?></option>
                     <?php foreach ($list_lever5 as $value5): ?>
                        <option value="<?= $value5['id']; ?>" <?php if(isset($father_id) && $father_id == $value5['id']){ echo 'selected'; } ?>>------------ <?= $this->Model_main->get_lang_main($value5['name'],$this->language_main); ?></option>
                     <?php endforeach ?>
                  <?php endforeach ?>
               <?php endforeach ?>
            <?php endforeach ?>
         <?php endforeach ?>
      </optgroup>
   </select>
</div>