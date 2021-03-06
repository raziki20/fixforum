<form action="components/add-new-notice.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <div class="form-group">
        <label for="notice-topic-name">Topic Name</label>
        <input type="text" class="form-control" id="notice-topic-name" name="notice_topic_name" placeholder="Enter Topic Name" required>
    </div>
    <div class="form-group">
        <label for="notice-topic-body">Topic Body</label>
        <textarea id="notice-topic-body" rows="9" class="form-control" placeholder="Body of the Topic" name="notice_topic_body" required></textarea>
    </div>
    <div class="form-group">
        <label for="notice-topic-kategori">Kategori</label>
        <br>
        <label class="radio-inline" for="kategori-inline-radio1"><input type="radio" id="kategori-inline-radio1" name="notice_topic_kategori[]" value="1"required> Tari Tradisional </label>
        <label class="radio-inline" for="kategori-inline-radio2"><input type="radio" id="kategori-inline-radio2" name="notice_topic_kategori[]" value="2"required> Tari Modern </label>
        <label class="radio-inline" for="kategori-inline-radio3"><input type="radio" id="kategori-inline-radio3" name="notice_topic_kategori[]" value="3"required> Tari Kreasi </label>
    </div>
    <hr>
    <label for="forum-topic-attachment">Upload Images</label>
    <input name="BackgroundImageFile" type="file" id="uploadBackgroundFile" class="btn btn-default" name="forum-topic-attachment"/>
    <hr>
    <button type="submit" class="btn btn-default" name="submit_button" id="submit_button">Submit</button>
</form>