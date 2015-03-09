
<div id="body" class='row'>
    <div class='col s9'>
        <p>This is the personal profile page of {username}!</p>
        <p>Name: {first_name} {last_name}</p>
        <p>Location: {location}</p>
    </div>
    <div class='col s3'>
        <h6 class='grey-text text-darken-2'>{username}'s playlists:</h6>
        <div class='collection'>
            {playlists}
            <a href="/play/{id}" class='collection-item red-text text-darken-4'>{name}</a>
            {/playlists}
        </div>
    </div>
</div>
