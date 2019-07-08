<?php if(!empty($this->posts)): ?>
    <div class="posts-wrapper">
        <?php foreach($this->posts as $post): ?>
            <div class="post-colum">
                <a href="http://127.0.0.1:8001/index.php/post/show/<?php echo $post->id ?>">
                    <img src="<?php echo $post->image ?>">
                    <h3><?php echo $post->title ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<style>
    body{
        background: #00ff00;
    }
    .post-colum{
        float: left;
        background: #fff;
        border: 1px solid #000;
        margin-right: 10px;
        width: 200px;
        text-align: center;
        padding: 5px;
        height: 300px;
    }
    .posts-wrapper{
        background: #ccc;
        width: 80%;
        margin: auto;
        padding: 10px;
        overflow: hidden;
    }

</style>