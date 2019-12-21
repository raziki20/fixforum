<form action="components/add-new-forum-post.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <div class="form-group">
        <label for="forum-topic-name">Topic Name</label>
        <input type="text" class="form-control" id="forum-topic-name" name="forum_topic_name" placeholder="Enter Topic Name" required>
    </div>
    <div class="form-group">
        <label for="forum-topic-body">Topic Body</label>
        <textarea id="forum-topic-body" rows="9" class="form-control" placeholder="Body of the Topic" name="forum_topic_body" required></textarea>
    </div>
    <div class="form-group">
        <label for="forum-topic-kategori">Kategori</label>
        <br>
        <label class="radio-inline" for="kategori-inline-radio1"><input type="radio" id="kategori-inline-radio1" name="forum_topic_kategori[]" value="1"> Tari Tradisional </label>
        <label class="radio-inline" for="kategori-inline-radio2"><input type="radio" id="kategori-inline-radio2" name="forum_topic_kategori[]" value="2"> Tari Modern </label>
        <label class="radio-inline" for="kategori-inline-radio3"><input type="radio" id="kategori-inline-radio3" name="forum_topic_kategori[]" value="3"> Tari Kreasi </label>
    </div>
    <hr>
    <label for="forum-topic-attachment">Upload Images</label>
    <input name="BackgroundImageFile" type="file" id="uploadBackgroundFile" class="btn btn-default" name="forum-topic-attachment"/>  
    <hr>
    <button type="submit" class="btn btn-primary" name="submit_button" id="submit_button">Submit</button>
</form>

 <script>
        ClassicEditor
            .create( document.querySelector( '#forum-topic-body' ) )
            .catch( error => {
                console.error( error );
            } );
</script>