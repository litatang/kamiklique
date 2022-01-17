<form action="/" method="GET">
    <label for="search">Search </label>
    <input type="text" name="s" id="search" value="<?php the_search_query();?>" required>
    <input type="hidden" name="cat" value="7">
    <button type="submit"> Search! </button>
</form>