<div class="messages index large-9 medium-8 columns content">
    <h3><?= __('messages') ?></h3>
    

    <div class="table-content">
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                   
                    <th scope="col"><?= $this->Paginator->sort('messageType') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    
                </tr>
            </thead>

            <tbody>

                <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $this->Number->format($message->id) ?></td>
                   
                    <td><?= h($message->messagetype) ?></td>
                    <td><?= h($message->message) ?></td>
                    <td><?= h($message->created) ?></td>
                    <td><?= h($message->modified) ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>


