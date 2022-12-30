<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<!-- Function that you can use files to uploud pictures for example. -->
<?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add title">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea id="editor1" class="form-control" name="body" placeholder="Add body"></textarea>
    </div>

    <div class="form-group">
            <label>Categories</label>
            <select name="category_id" class="form-control">
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['Id']; ?>"><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
    </div>
    <div class="form-group">
        <label>Uploud Image</label>  
        <input type="file" name="userfile" size="20">                  
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
    </form>