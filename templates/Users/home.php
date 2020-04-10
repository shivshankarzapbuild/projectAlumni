<?= $this->element('header') ?>
  <div class="row">
    <div class="col-sm-1" style="background-color: lavender;height:auto;">
      
    </div>
    <div class="col-sm-10">
    
   <?php  foreach ($posts as $post): ?>      
      <center>
      <div class="posts">
      <article class="articleClass">
        <header >
          <div class="header" > 
            
            <h2> <?php echo $post->post; ?></h2>
            <h6> <?= $this->Html->link($post->has('users') ? $post->users['first_name']: ' ',['controller'=>'Users','action'=>'profile']); echo " ". date('h:i A', strtotime($post->created)); ?></h6>
          </div>
        </header>
         <div class="image_field"> 
          </div>
          <div class="card_image">
            <div>
              <?= $this->Html->image($post->image,['alt'=>'Note this','class'=>'image_card','width'=>'80%','height'=>'50%'])?>
            </div>
          </div>
          <footer>
            <details>
              <summary class="commentSummary">Comments</summary>

              <?= $this->Html->link(__('New Comment'),['controller'=>'Comments','action' => 'add', $post->id]) ?>


              <?php foreach ($post->comments as $comment) : ?>
                <div class="comments-inside">
                  <br>
                     <?php echo $comment->comments; ?>
                  <br>  
                </div>
                <?php endforeach; ?>                
                <?= $this->Form->create() ?>               
              </details>
          </footer>
      </article>
    </div>

      </center>

     
    <?php endforeach; ?>
      
    </div>
       <div class="col-sm-1" style="background-color: lavender;height: 500px;">
      
    </div>
    
    
  </div>


<?= $this->element('footer') ?>

<script type="text/javascript">
  
  $('document').ready(function(){

         $('#search').keyup(function(){

            var searchkey = $(this).val();
            searchmessages( searchkey );
         });

        function searchmessages( keyword ){
            var data = keyword;


        $.ajax({

                    method: 'get',
                    url : '/users/searchuser',
                    data: {keyword:data},

                    success: function( response )
                    {       
                       $('.table-content').html(response);
                    }
                });
        };
    });
</script>
