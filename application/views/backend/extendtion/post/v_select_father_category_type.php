 <label class="mb-3">Danh mục cha</label>
 <select class="select2 form-control mb-3 custom-select" name="post_category_id_ze" style="width: 100%; height:36px;">
   <option value="0" selected>Chưa phân loại</option>
   <optgroup label="Danh mục chọn">
      <!-- Lấy 5 cấp của danh mục cha -->
      <?php $list_lever1 = $this->Model_news_category->show_all_by_father(0); ?>
      <?php foreach ($list_lever1 as $value1): ?>
         <?php $category1 = json_decode($value1['name']) ?>
         <?php $list_lever2 = $this->Model_news_category->show_all_by_father($value1['id']); ?>
         <option value="<?= $value1['id']; ?>"><b><?= $category1->{$this->id_language}; ?></b></option>
         <?php foreach ($list_lever2 as $value2): ?>
            <?php $category2 = json_decode($value2['name']) ?>
            <?php $list_lever3 = $this->Model_news_category->show_all_by_father($value2['id']); ?>
            <option value="<?= $value2['id']; ?>">--- <?= $category2->{$this->id_language}; ?></option>
            <?php foreach ($list_lever3 as $value3): ?>
               <?php $category3 = json_decode($value3['name']) ?>
               <?php $list_lever4 = $this->Model_news_category->show_all_by_father($value3['id']); ?>
               <option value="<?= $value3['id']; ?>">------ <?= $category3->{$this->id_language}; ?></option>
               <?php foreach ($list_lever4 as $value4): ?>
                  <?php $category4 = json_decode($value4['name']) ?>
                  <?php $list_lever5 = $this->Model_news_category->show_all_by_father($value4['id']); ?>
                  <option value="<?= $value4['id']; ?>">--------- <?= $category4->{$this->id_language}; ?></option>
                  <?php foreach ($list_lever5 as $value5): ?>
                     <?php $category5 = json_decode($value5['name']) ?>
                     <option value="<?= $value5['id']; ?>">------------ <?= $category5->{$this->id_language}; ?></option>
                  <?php endforeach ?>
               <?php endforeach ?>
            <?php endforeach ?>
         <?php endforeach ?>
      <?php endforeach ?>
   </optgroup>
</select>