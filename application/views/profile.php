
<div id="body">
    <p>This is the personal profile page of {username}!</p>
    <p>Name: {first_name} {last_name}</p>
    <p>Location: {location}</p>
    <br/>
    <p>{username}'s playlists:</p>
    <ul>
    {playlists}
    <li><a href="/play/{id}">{name}</a></li>
    {/playlists}
    </ul>
</div>
