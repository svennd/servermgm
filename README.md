# Servermgm
Server room management system; I wanted a quick system that I could access on any LAN computer to see what disks/server/... we have around.
We used excel sheets before, but thats just bad practice, so I took the time to throw some software together add some sql and voila,
here you see our first attempt at a inventory system.

# Install
You can use it, but beware that update paths might not be available in the future.

1) insert into new database : setup.sql
2) copy & modify :  /application/config.php.default -> /application/config.php
3) copy & modify :  /application/database.php.default -> /application/database.php
4) copy & modify :  /application/routes.php.default -> /application/routes.php
5) browse to the location


# Credits
There is little magic happening here, most of this code base is wonderfully taken from the internet and works nicely.
- CodeIgniter : http://www.codeigniter.com
- Bootstrap : http://getbootstrap.com
- Pickaday : https://github.com/dbushell/Pikaday
- JQuery : https://jquery.com
- DataTables : https://datatables.net

# Screenshots
![Device View](https://www.svennd.be/wp-content/uploads/2016/04/device_view.png)
![HDD View](https://www.svennd.be/wp-content/uploads/2016/04/hdd_view.png)
![Rack View](https://www.svennd.be/wp-content/uploads/2016/04/rackview.png)

# License 
The MIT License (MIT)

Copyright (c) 2016, SvennD

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.