# DevOps Assignment -  Blood Bank Management using Apache, Mysql and Docker Compose

You are working in MNC and have been asked by your manager to create a website for
Blood bank management (Website should contain one login page and web-pages for entering
and retrieving the donor’s details to and from the database (mysql)).
Use docker-compose and implement the following:
1. Create two volumes having name (<first-name>_<last 4 digits of registration No.>
and <first-name>_<first 4 digits of registration No.>) and connect with apache and
mysql server through bind mount.
2. Create a private network with subnet as your registration number (eg. Reg. no:
11801234, then subnet: 11.80.12.34) for hosting your website.
3. For web server create a docker file with your name (student name).
4. Set the environment variables (name: student_name, regno: student’s Reg. no).
5. Upload the final image on the docker-hub and and project on git-hub (mention the
link of github in the assignment).
