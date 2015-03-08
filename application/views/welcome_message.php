
<div id="body" class='row'>
    <div class='col s8 '>
        <div class="video-container">
            <iframe width="853" height="480" src="https://www.youtube.com/embed/{playing}" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <div class="col s4">
        <h6>Currently playing:</h6>
        <div class="collection">
            {content}
            <a class='collection-item {highlight}' href="{link}">{link}</a>
            {/content}
        </div>
    </div>
</div>