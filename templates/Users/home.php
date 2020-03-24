<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <?= $this->Html->link(__('Alumni Network'),['action' => 'index','class' => 'navbar-brand']) ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <?= $this->Html->link(__('Home'),['action' => 'home','class' => 'nav-link']) ?>
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Profile'),['action' => 'profile','class' => 'nav-link',]) ?>

          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Chats'),['action' => 'chat','class' => 'nav-link']) ?>
          </li>
           <li class="nav-item">
            <?= $this->Html->link(__('Help'),['action' => 'help','class' => 'nav-link']) ?>
          </li>
        </ul>
          <li class="nav-item">
            <?= $this->Html->link(__('Logout'),['action' => 'logout','class' => 'nav-link']) ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="backgroundImage">

    

  </div>

