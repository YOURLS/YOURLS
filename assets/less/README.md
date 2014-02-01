YOURLS Style
============

Editing
-------

YOURLS design is now built on top of [Bootstrap](http://getbootstrap.com), a popular
web development framework.

As such, YOURLS utilizes [LESS CSS](http://lesscss.org), a dynamic stylesheet language.

If you want to modify YOURLS style for your own good or to submit a fix: 

1. Edit `./[group].less` where `[group]` is the category of what you want to edit.
2. Recompile `./yourls.less` to `../css/yourls.min.css`.

Other `.less` files in sub-directories should be left unmodified, as they all come as is
from different dependencies.

Dependencies
------------

* [Bootstrap](http://getbootstrap.com)
* [Font-Awesome](http://fontawesome.io)
* [Flag Sprites](http://flag-sprites.com)
