<div class="column-responsive column-80">
        <div class="categories form content">
            <?= $this->Form->create($comment) ?>
            <fieldset>
                <legend><?= __('Add Comment') ?></legend>
                <?php
                    echo $this->Form->control('comments',['type' => 'text']);
                    
                    
                ?>
            </fieldset>
            <?= $this->Form->button('Update',['type' => 'submit']); 
                    ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>