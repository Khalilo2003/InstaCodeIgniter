<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
<img  src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" />
<!-- like btn -->
<div class="likeButton d-flex justify-content-center align-items-center rounded-circle" style="width: 60px; height: 60px">
    <i id="btn" class="fa-regular fa-heart fs-1" onclick="like(this)"></i>
</div>



<div class="post-body">
    <p><?php echo word_limiter($post['body'], 30) ; ?></p>
</div>

<script>
    var btn = document.getElementById('fa-heart');

    if(btn.classList.contains("far")){
        btn.classList.remove("far");
        btn.classList.add("fas");
    }

    function like(e)
    {
        if(e.classList.contains("fa-regular"))
        {
            e.classList.add("fa-solid")
            e.classList.add("text-danger")
            e.classList.remove("fa-regular")
        }
        else
        {
            e.classList.remove("fa-solid")
            e.classList.remove("text-danger")
            e.classList.add("fa-regular")
        }
       
    }

</script>


<hr>
<div class="d-flex gap-2">
    <a class="btn btn-secondary" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo base_url(); ?>posts/delete/<?php echo $post['id']; ?>">Delete</a>
</div>