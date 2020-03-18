<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('middle_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('dateofbirth');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('status');
                    echo $this->Form->control('college_name');
                    echo $this->Form->control('profile_pic');
                    echo $this->Form->control('passing_year');
                    echo $this->Form->control('mobile_number');
                    echo $this->Form->control('address_line_1');
                    echo $this->Form->control('address_line_2');
                    echo $this->Form->control('district');
                    echo $this->Form->control('state');
                    echo $this->Form->control('country');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
