<?php 
if(isset($_GET['topic_id'])){
    $topic_id=$_GET['topic_id'];
    $result= mysqli_query($database,"SELECT * FROM forum_topic WHERE forum_topic_id='$topic_id'");
    $rws= mysqli_fetch_assoc($result);
}
 ?>
<form action="components/update-forum-post.php" method="post" enctype="multipart/form-data" id="UploadForm">
<input type="hidden" name = "forum_topic_id" value = "<?php echo $topic_id;?>">
    <div class="form-group">
        <label for="forum-topic-name">Topic Name</label>
        <input type="text" class="form-control" value="<?php echo $rws['forum_topic_name']; ?>" id="forum-topic-name" name="forum_topic_name" placeholder="Enter Topic Name" required>
    </div>
    <div class="form-group">
        <label for="forum-topic-body">Topic Body</label>
        <textarea id="forum-topic-body"  rows="9" class="form-control" placeholder="Body of the Topic" name="forum_topic_body" required><?php echo $rws['forum_topic_body']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="forum-topic-kategori">Kategori</label>
        <br>
        <label class="radio-inline" for="kategori-inline-radio1"><input type="radio" id="kategori-inline-radio1" name="forum_topic_kategori[]" value="1" <?php if($rws['forum_topic_kategori']==1){echo "checked";}?> required> Tari Tradisional </label>
        <label class="radio-inline" for="kategori-inline-radio2"><input type="radio" id="kategori-inline-radio2" name="forum_topic_kategori[]" value="2" <?php if($rws['forum_topic_kategori']==2){echo "checked";}?> required> Tari Modern </label>
        <label class="radio-inline" for="kategori-inline-radio3"><input type="radio" id="kategori-inline-radio3" name="forum_topic_kategori[]" value="3" <?php if($rws['forum_topic_kategori']==3){echo "checked";}?> required> Tari Kreasi </label>
    </div>
    <hr>
    <label for="forum-topic-attachment">Upload Images</label> <br>
    <img src="userfiles/uploads/<?php echo $rws['forum_topic_image']; ?>" alt="" class="img-fluid">
    <input name="BackgroundImageFile" type="file" id="uploadBackgroundFile" class="btn btn-default" name="forum-topic-attachment"/>  
    <hr>
    <button type="submit" class="btn btn-primary" name="submit_button" id="submit_button">Edit</button>
</form>