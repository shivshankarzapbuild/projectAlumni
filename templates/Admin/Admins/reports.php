<div class="wrapper">
<!-- Sidebar Holder -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>DashBoard</h3>
    </div>

    <ul class="list-unstyled components">
        
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">USERS</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/admin/users">Users</a>
                </li>
                <li>
                    <a href="/admin/posts">Posts</a>
                </li>
                <li>
                    <a href="/admin/comments">Comments</a>
                </li>
                <li>
                    <a href="/admin/deletedmessages">DeletedMessages</a>
                </li>
                <li>
                    <a href="/admin/deletedconversations">DeletedConversations</a>
                </li>
            </ul>
        </li>
        <li>
            
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Deleted users</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        <li>
            <a href="/admin/reports"> Reports</a>
        </li>
        <li>
            <a href="/admin/contacts">Contact</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
       <li>
            <a href="/users/logout" class="article">lOGOUT</a>
        </li>
    </ul>
</nav>

<!-- Page Content Holder -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">link 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">link 4</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <h2>Reports</h2>
    <p><h3><?= __('Reports') ?></h3>
<div class="table-responsive">
<table>
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('subject') ?></th>
            <th><?= $this->Paginator->sort('reporttype') ?></th>
            <th><?= $this->Paginator->sort('Notes') ?></th>

            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>

            
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reports as $report): ?>
        <tr>
            <td><?= $this->Number->format($report->id) ?></td>
            <td><?= h($report->user_id) ?></td>
            <td><?= h($report->subject) ?></td>
            <td><?= h($report->report_type) ?></td>
            <td><?= h($report->notes) ?></td>
            <td><?= h(date_format($report->created,'M d Y')) ?></td>
            <td><?= h(date_format($report->created,'M d Y')) ?></td>

            

            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div></p>
   
    