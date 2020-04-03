<div class="column-responsive column-80">
        <div class="posts view content">
            <h3><?= h($post->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($post->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($post->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td style="font-size: 45px;"><?= $post->has('category') ? $this->Html->link($post->category->name, ['controller' => 'Categories', 'action' => 'view', $post->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= $this->Html->image($post->image,['height'=>200,'width'=>200]) ?>
                
                    </td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= date_format($post->created,'M d Y') ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
