<h2><?= $title; ?></h2>
<div class="row">
<?php foreach($posts as $post) : ?>
<h3><?php echo $post['title']; ?></h3>
    <div class="col-md-9 d-flex flex-column gap-2">
        <small class="post-date">Posted on:<?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>
        <div class="col-md-3">
            <img class="post-thumb" width="950px" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" />
        </div>
        <div class="likeButton d-flex justify-content-center align-items-center rounded-circle" style="width: 60px; height: 60px">
            <i id="btn" class="fa-regular fa-heart fs-1"></i>
        </div>
        <p style="margin-top: -16px;"><?php echo word_limiter($post['body'], 60); ?></p>  
        <p><a class="btn btn-secondary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">See Post<a></p>
        <hr>
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
<?php endforeach; ?>