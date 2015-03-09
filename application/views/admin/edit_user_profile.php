<div id="body">
    <script type="text/javascript" src="<?php echo site_url('../assets/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('../assets/ckfinder/ckfinder.js'); ?>"></script>

    <br/>
    <br/>
    <form action="/admin/update_data" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="userID" value={id}>
        
        <label>User ID:</label>
        <input type="text" name="username" value={username}>
        
        <label>First Name:</label>
        <input type="text" name="first_name" value={first_name}>
        
        <label>Last Name:</label>
        <input type="text" name="last_name" value={last_name}>
        
        <label>Location:</label>
        <input type="text" name="location" value={location}>
        
        <textarea name="profile">{profile}</textarea>
        <input class="btn" type="submit" value="Update"/>
    </form>
    <script>
        CKEDITOR.replace('profile', {
            'filebrowserUploadUrl': '/admin/upload_receive'
        });
    </script>

    <br/>
    <p>{username}'s playlists:</p>
    <ul>
        {playlists}
        <li><a href="/play/{id}" style="color: red">{name}</a></li>
        {/playlists}
    </ul>
</div>