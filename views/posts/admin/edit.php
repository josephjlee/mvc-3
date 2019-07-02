<form method="post" action="http://127.0.0.1:8001/post/update">
    <div class="container">
        <h1>Your Blog</h1>
        <p>Please write your blog bellow</p>
        <input type="text" placeholder="Enter Title" value="<?php echo $this->post->getTitle(); ?>"name="title">
        <br>
        <textarea rows="10" cols="50" name="content" placeholder="Please write your main text in this window."><?php echo $this->post->getContent(); ?></textarea><br>
        <input type="text" placeholder="please enter your image link" name="image" value="<?php echo $this->post->getImage(); ?>">
        <input type="hidden" name="id" value="<?php echo $this->post->getId(); ?>">
        <div>
            <button type="submit" class="signupbtn">Edit Post</button>
        </div>
    </div>
</form>