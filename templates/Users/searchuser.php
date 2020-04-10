<?= $this->element('header') ?>
  <div class="row">
    <div class="col-sm-1" style="background-color: lavender;height:auto;">
      
    </div>
    <div class="col-sm-10">
      <?php pr($names); ?>

      <?php foreach($names as $user): ?>
            <table class="table-content">
                <?php die("inside foreach "); ?>
                   <td> <?= h($user->first_name)?></td>
            </table> 
       <?php endforeach; ?>

    </div>
       <div class="col-sm-1" style="background-color: lavender;height: 500px;">
      
    </div>
    
    
  </div>


<?= $this->element('footer') ?>
