<div id="body">
    <script type="text/javascript" src="<?php echo site_url('../assets/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('../assets/ckfinder/ckfinder.js'); ?>"></script>

    <br/>
    <br/>
    <form action="/admin/upload_receive" method="POST" enctype="multipart/form-data">
        User ID:    <input type="text" name="username" placeholder="ID" value={username}>
        First Name: <input type="text" name="firstname" placeholder="First Name" value={first_name}>
        Last Name:  <input type="text" name="lastname" placeholder="Last Name" value={last_name}>
        Location:   <input type="text" name="location" placeholder="Location" value={location}>
        Profile:<br/>
        <textarea name="description" placeholder="description" rows="15">{profile}</textarea>
        <input class="btn" type="submit" value="Update"/>
    </form>
    <script>
        CKEDITOR.replace('description');
    </script>
    
    <br/>
    <p>{username}'s playlists:</p>
    <ul>
        {playlists}
        <li><a href="/play/{id}">{name}</a></li>
        {/playlists}
    </ul>
</div>