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
                    
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Deleted Users</a>
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
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
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
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
           
            <div class="line"></div>

            <h2>POSTS</h2>
            <p><h3><?= __('Posts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('post') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    

                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach ($posts as $post): ?>

                    <?php pr($post->comments[comments]); die("----------->>>"); ?>
                 <tr>
                    <td><?= $this->Number->format($post->id) ?></td>

                    <td><?= $post->has('comments') ? $this->Html->link($post->comments[$comments], ['controller' => 'Admins', 'action' => 'view', $post->comments[$id]]) : '' ?></td>
                    <td><?= h($post->post) ?></td>
                    <td><?= h($post->image) ?></td>
                    <td><?= h(date_format($post->created,'M d Y')) ?></td>
                    <td><?= h(date_format($post->created,'M d Y')) ?></td>

                    <td><?= $post->has('comments') ? $this->Html->link($post->comments[$comment], ['controller' => 'Admins', 'action' => 'view', $post->comments[$id]]) : '' ?></td>

                    

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div></p>

            <div class="line"></div>

            <h2>Deleted Users</h2>
            <p>Deleted users Messages</p>

            <div class="line"></div>

            <h3>Reports</h3>
            <p>The Reports will Appear here</p>
        </div>
    </div>
