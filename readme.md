Side project for Hi Zero; a sound archive web application.

Web application that displays info on poetry events and poet bios, with ability to play MP3 recordings hosted on the site.

Page templates that pull data dynamically from the database:
1. Basic home page with header image and title, a search bar to search events and readers, and links to main parts of site, Events and Readers:
2. Events page - list of events showing poster thumbnails
3. Event page - event page with info incl readers, poster, date, MP3 sound files of poetry readings from the event
4. Readers page - list of readers (poets)
5. Reader - reader page with info incl short bio, links to events they were at, and MP3 sound file of poetry reading(s)
6. Search results page - list of readers/events that meet the search terms entered on the home page

Front end that's poster-oriented similar to https://posters.calarts.edu/

Back end using MySQL, PHP, and database admin tool PHPMyAdmin.

Scope:
1. Site will not require user accounts, so no CRUD functionality necessary.
2. Just needs to read from the database, display info and play MP3s.
3. All event and reader data should be able to be imported via a CSV file using PHPMyAdmin.
4. This data will include info on the ~190 readers and ~80 events.