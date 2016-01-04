# AchieveCraft.net
## Remake of achievecraft.com
Because achievecraft.com is no longer up.

(Does not include avatars anymore because [there](https://crafatar.com/) [are](http://visage.surgeplay.com/) [tons](https://minotar.net/) [of](https://pixelface.net/) [alternatives](http://mcapi.ca/examples/avatar-api). Requests to old avatar paths will redirect to crafatar.com)

___

## How are the achievements made?

The achievements are made in /backend/Achievement.class.php

This class can be used by its self with out the rest of this repository. (Even the icon class. This class takes a GD image resource for icons)

Feel free to use Achievement.class.php in your own projects.

___

## Caching

Icons and achievements are cached in the `cache` dir. Achievement cache names are the icon id + top text + bottom text then hashed using MD5. Same for icons but just the icon id.

Also cached client side if possible. (ETag. Expires +1 week)

___

##Icons

Icons are all stored in a MongoDB database. So for Icon.class.php to work you will need the Mongo PHP extension. (Not the new MongoDB extension)